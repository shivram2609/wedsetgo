<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\CaptchaTrait;
use App\User;
use App\UserDetail; 
use Session;
use Catagory;
use Auth;
use Config;
use DB;
use Socialite;
 
class UserController extends Controller
{    
	use CaptchaTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = '';
        return view('user.index', array('user' => $user, 'title' => 'User Page'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
		
		//~ $data[] = '';
			//~ Mail::send('emails.registgerwelcome',$data, function($message)
            //~ {
				//~ 
                //~ $message->from('support@swankcook.com', "zestminds");
                //~ $message->subject('Welcome to site name');
                //~ $message->to('ranjuzestmind@gmail.com');
                 //~ //dd($message);
            //~ });
            //~ die;
        return view('news.register', array('title' => 'Register'));
    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$input = $request::all();
		print_r($input);
		print_r($request);
		$request->captcha = $this->captchaCheck();
		dd($request);
		
		
        $this->validate($request, array(
                                'first_name' => 'required|max:255',
                                'last_name' => 'required|max:255',
                                'email' => 'required|email|max:255|unique:users',
                                'password' => 'required|min:6|confirmed',
                                'g-recaptcha-response'  => 'required',
								'captcha'               => 'required|min:1'
                            )
                        );
        
        $input = $request->all();      
        $token = str_random(64);
        $user = User::create(array(
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'user_type_id' => 3,
			'confimation_token'=>$token,
			'porfessional_request'=>0
        ));
        if ( $user ) {
			//echo $user->id;
			UserDetail::create(array(
						'user_id'=>$user->id,
						'first_name' => $request->first_name, 
						'last_name' => $request->last_name
					));
			Controller::getEmailData('SIGNUP');
			$this->email_body = str_replace("{USER}",ucfirst($request->first_name),$this->email_body);
			$link = "<a href='".$this->staticLink."confirmation/".$token."'>Click Here</a>";
			$this->email_body = str_replace("{CLICK_HERE}",$link,$this->email_body);
			Controller::sendMail($request->email);
			Session::flash('flash_message', 'User registration successfully, please check your email to comnfirm your account.');
		} else {
			Session::flash('flash_message', 'User registration can not be done, Please try again.');
		}
			
        //return redirect()->back();
        //return redirect('user');
        return redirect()->route('home_path');
    }
    
    /**
     * Show the login form
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('news.login', array('title' => 'Login'));
    }
    
    /**
     * Authenticate user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request, $identifier =NULL)
    {
		if ( empty($identifier) ) {
			$loginCredetials = array('email' => $request->email, 'password' => $request->password ); 
		} else {
			$loginCredetials = array('identifier' => $identifier,'password' => $identifier ); 
		}
		if (Auth::attempt($loginCredetials)){ 
			if (Auth::user()->is_active == 1) {
				$users = DB::table('users')->select('user_details.*','users.email')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();
				Session::put("users",$users);
				if (Auth::user()->user_type_id == 1) {
					return redirect()->route('admin.admindashboard');
				} elseif (Auth::user()->user_type_id == 2){
					return redirect()->route('news.edit-profile');
				} elseif(Auth::user()->user_type_id == 3){
					return redirect()->route('news.edit-profile');
					
				} else {
					return redirect()->route('user.index');
				}
			} else {
					Session::flash('flash_message', 'Your account is not active.');
					return redirect()->route('news.login');
			}
        } else {
			Session::flash('flash_message', 'Incorrect username or password.');
			return redirect()->route('home_path');
        }        
    }
    
    /**
     * Logout user
     *
     * @return \Illuminate\Http\Response
     */
    public function logout() {
        Auth::logout();  
        Session::flush();      
        return redirect()->route('home_path');
    }
    
    /**
     * Show the login form
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('news.account', array('title' => 'My Account'));
    }   
    
	public function getData( $data = 'one' )
	{
		if ( Auth::user()->permission == 'admin' ) {
			//...
		} else {
			//...
		}
	}

	public function postData( Request $request, $data = 'one' )
	{
		if ( Auth::user()->permission == 'admin' ) {
			//...
		} else {
			//...
		}
} 

	public function adminchangepassword(Request $request) {
		if ($request->isMethod('post')) {
			$this->validate($request, array(
									'currentpassword' => 'required',
									'password' => 'required|min:6|confirmed',
                            ));
		   $user = Auth::user()->id;
		   
		   $currentPassword=bcrypt($request->input('currentpassword'));
			if ( $res = DB::table('users')->where(['users.id'=>Auth::user()->id],["password"=>$currentPassword])->update(['users.password' => bcrypt($request->input('password'))]) ) {
				Session::flash('flash_message', 'Password change successfully');   
		   } else {
			    Session::flash('flash_message', 'Password not change, Please try again');
		   }
		} 
		return view('admin.adminchangepassword', array('title' => 'Change Password')); 		 
		
	}
	
	public function forgotpassword(Request $request) {
		if ($request->isMethod('post')) {
			$this->validate($request, 
				array('email' => 
					'required|email|max:255|',
				)
            );
                            				
            if ($users = DB::table('users')->select('user_details.*','users.email')->join('user_details','user_details.user_id','=','users.id')->where(['users.email'=>$request->email],['users.is_active'=>1])->first()) {
				$token = str_random(64);
				
				if ( User::where('users.email',$request->email)->update(['users.forgot_password_token' => $token]) ) {
					Controller::getEmailData('FORGOT_PASSWORD');
					$this->email_body = str_replace("{USER}",ucfirst($users->first_name),$this->email_body);
					$link = "<a href='".$this->staticLink."resetpassword/".$token."'>Click Here</a>";
					$this->email_body = str_replace("{CLICK_HERE}",$link,$this->email_body);
					Controller::sendMail($request->email);
					Session::flash('flash_message', 'Mail has been sent please check your email to reset password');
					return redirect()->route('home_path');
				}
								
			}
                            
		}
		return view('news.forgotpassword', array('title' => 'Forgot Password'));
	}
	
	public function resetpassword(Request $request, $token){
		if ($request->isMethod('post')) {
			$this->validate($request, array(
					'password' => 'required|min:6|confirmed',
				)
			);
			if ( User::where('users.forgot_password_token',$token)->update(['users.password' => bcrypt($request->password)]) ) {
				User::where('users.forgot_password_token',$token)->update(['users.forgot_password_token' => '']);
				Session::flash('flash_message', 'Password reset successfully.');
				return redirect()->route('home_path');
			} else {
				Session::flash('flash_message', 'Password could not be reset successfully.');
			}
			
		} elseif ( $request->isMethod('get') && !empty($token) && $users = DB::table('users')->select('users.email')->where(['users.forgot_password_token'=>$token],['users.is_active'=>1])->first()) {
			
			
		} else {
			Session::flash('flash_message', 'Invalid Request.');
			return redirect()->route('news.login');
		}
		return view('news.resetpassword', array('title' => 'Reset Password'));
	}	
	
	public function confirmation(Request $request, $token){
		if (!empty($token)) {
			if ( User::where('users.confimation_token',$token)->update(['users.is_active' => 1])) {
				User::where('users.confimation_token',$token)->update(['users.confimation_token' => '']);
				Session::flash('flash_message', 'Account confirmed successfully.');
				return redirect()->route('news.login');
			} else {
				Session::flash('flash_message', 'Invalid request.');
				return redirect()->route('news.login');
			}
		}
		
	}
	
	public function getSocialLogin($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
	
	public function twitterCallBack(Request $request) {
		$user = Socialite::driver("twitter")->user();
		return $this->checkorcreate($request,$user,'Twitter');
	}
	public function facebookCallBack(Request $request) {
		$user = Socialite::driver("facebook")->user();
		return $this->checkorcreate($request,$user,'Facebook');
	}
	
	public function googleCallBack(Request $request) {
		$user = Socialite::driver("google")->user();
		return $this->checkorcreate($request,$user,'Google');
	}
	
	function checkorcreate( $request,$user, $logintype ) {	
		$users = DB::table('users')->select('users.*')->where(['users.identifier'=>$user->id])->first();	
		if(empty($users)){
			$newUser = array(
				'identifier' => $user->id,
				'email' => (isset($user->email) && !empty($user->email))?$user->email:$user->id."@".$logintype.".com",
				'password' => bcrypt($user->id),
				'login_type' => $logintype,
				'is_active' => 1,
				'user_type_id' => 3
			);
			if ( $logintype == 'Google' ) {
				$newUser['email'] = $user->email;
			}
			$socialUser = User::create($newUser);
			if ( $socialUser ) {
				//echo $user->id;
				UserDetail::create(array(
							'user_id'=>$socialUser->id,
							'first_name' => $user->name,
						));
			}
			$userId = $socialUser->id;
		} else {
			$userId = $users->id;
		}
		if ( Auth::loginUsingId($userId) ) {
			//dd(Auth::user()->is_active);
			if (Auth::user()->is_active == 1) {
				$users = DB::table('users')->select('user_details.*','users.email')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();
				Session::put("users",$users);
				return redirect()->route('news.edit-profile');
			} else {
				Session::flash('flash_message', 'Your account is not active.');
				return redirect()->route('logout');
			}
		}
	}
	
	public function editprofile(Request $request){
		
		if ($request->isMethod('post')){
			 $this->validate($request, array(
                                'first' => 'required|max:255',
                                'lastname' => 'required|max:255',
                                'email' => 'required|email|max:255',
                            )
                        );
			$socialArray['fb'] = $request->fb;
			$socialArray['twitter'] = $request->twitter;
			$socialArray['google'] = $request->google;
			$socialVal = serialize($socialArray);
			$data = array();
			$data['first_name'] = $request->first;
			$data['last_name'] = $request->lastname;
			$data['phone_no'] = $request->phone;
			$data['category_id'] = $request->category_id;
			$data['gender'] = $request->gender;
			$data['website'] = $request->website;
			$data['dob'] = $request->dob;
			$data['address'] = $request->address;
			$data['trade_description'] = $request->trade_description;
			$data['detail'] = $request->detail;
			$data['social_media'] = $socialVal;
			$file = $request->file('profile_image');
			if($request->file('profile_image')){
				$destination = "uploads/avatars";
				$filename = $file->getClientOriginalName();
				$request->file('profile_image')->move($destination,$filename);
				$data['profile_image'] = $filename;
			}
			$file = $request->file('background_image');
			if($request->file('background_image')){
				$destination = "uploads/background";
				$filename = $file->getClientOriginalName();
				$request->file('background_image')->move($destination,$filename);
				$data['background_image'] = $filename;
			}
			if(!empty($request)){
				$result = DB::table('users')->where('id',Auth::user()->id)->update(['email'=> $request->email]);
				$result = DB::table('user_details')->where('user_id',Auth::user()->id)->update($data);
			}
			
		}
		$catagory= DB::table('catagories')->where(['is_active'=>1])->orderBy('name')->lists('name', 'id');
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();
		
		$socialVal = unserialize($user->social_media);
		return view('news.edit-profile', array('title' => 'edit-profile', 'catagory'=>$catagory, 'user'=>$user, 'socialVal'=>$socialVal));
	}
	
	public function sendRquestProfessional(){
		$users = DB::table('users')->select('users.porfessional_request')->where('id', Auth::user()->id)->first();
		if($users->porfessional_request==0){
			$result = DB::table('users')->where('id',Auth::user()->id)->update(['porfessional_request'=> 1]);
						$this->email_body .= "Sender Email: " .Auth::user()->email. "<br/><br/>";
						$this->email_body .= "Message: Hello Dear Admin, <br/><br/> You have a request for professsional account. ";
						$this->email_subject = "Professional Request";
						Controller::sendMail('ranjuzestmind@gmail.com');  
						Session::flash('flash_message', 'Your Request has been sent to site admin.');
		} else {
			Session::flash('error_message', 'Request pending Please wait some time');
		}
		return redirect()->route('news.edit-profile');
	}
	
}
	/* end of function */

?>
