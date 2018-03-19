<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\CaptchaTrait;
use App\User;
use App\UserDetail;
use App\Follower; 
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
		//dd($request->all());
		//$request->merge(['captcha' => $this->captchaCheck()]);
		$this->validate($request, array(
                                'first_name' => 'required|max:255',
                                'last_name' => 'required|max:255',
                                'email' => 'required|email|max:255|unique:users',
                                'password' => 'required|min:6|confirmed',
                                'g-recaptcha-response'  => 'required',
				//				'captcha'               => 'required|min:1',
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
			if($request->u_type == 1) { 
				 Controller::getEmailData('SIGNUP');
			 } else { 
				 Controller::getEmailData('PROFESSIONAl');
			 }
			 $this->email_body = str_replace("{USER}",ucfirst($request->first_name),$this->email_body);
			$link = "<a href='".$this->staticLink."confirmation/".$token."'>Click Here</a>";
			 $this->email_body = str_replace("{CLICK_HERE}",$link,$this->email_body);
			Controller::sendMail($request->email);
			Session::flash('flash_message', 'User registration successfully, please check your email to comnfirm your account.');
		} else {
			Session::flash('error', 'User registration can not be done, Please try again.');
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
				} elseif (Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 3){
					$url =$request->input();
					$url = $url['url'];
					if ( !empty($url) ) {
						return redirect($url);
					} else {
						return redirect('/p/'.Auth::user()->id."-".$users->first_name."-".$users->last_name);
					}
					
				} else {
					return redirect()->route('user.index');
				}
			} else {
					Session::flash('flash_message', 'Your account is not active.');
					return redirect()->route('home_path');
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

	public function changepassword(Request $request) {
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
			    Session::flash('error', 'Password not change, Please try again');
		   }
		} 
		return redirect()->route('home_path');		
		return view('news.changepassword', array('title' => 'Change Password')); 
		
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
				Session::flash('error', 'Password could not be reset successfully.');
			}
			
		} elseif ( $request->isMethod('get') && !empty($token) && $users = DB::table('users')->select('users.email')->where(['users.forgot_password_token'=>$token],['users.is_active'=>1])->first()) {
			
			
		} else {
			Session::flash('error', 'Invalid Request.');
			return redirect()->route('news.login');
		}
		return view('news.resetpassword', array('title' => 'Reset Password'));
	}	
	
	public function confirmation(Request $request, $token){
		if (!empty($token)) {
			if ( User::where('users.confimation_token',$token)->update(['users.is_active' => 1])) {
				User::where('users.confimation_token',$token)->update(['users.confimation_token' => '']);
				Session::flash('flash_message', 'Account confirmed successfully.');
				return redirect($this->staticLink);
			} else {
				Session::flash('error', 'Invalid request.');
				return redirect($this->staticLink);
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
				Session::flash('error', 'Your account is not active.');
				return redirect()->route('logout');
			}
		}
	}
	
	public function editprofile(Request $request, $id=Null){	
		if ($request->isMethod('post')){
			 $this->validate($request, array(
                                'first' => 'required|max:255',
                                'lastname' => 'required|max:255',
                                'email' => 'required|email|max:255',
                                ));
        
			$socialArray['fb'] = $request->fb;
			$socialArray['twitter'] = $request->twitter;
			$socialArray['google'] = $request->google;
			$socialArray['instagram'] = $request->instagram;
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
			$data['location_id'] = $request->location_id;
			$data['city'] = $request->city;
			$data['country'] = $request->country;
			$data['state'] = $request->state;
			$data['zipcode'] = $request->zipcode;
			if($request->category_id == 0){
				$data['other_category'] = $request->other_category;
			}else{
				$data['other_category'] = NULL;
			}
			if($request->location_id == 0){
				$data['other_location'] = $request->other_location;
			}else{
				$data['other_location'] = NULL;
			}
			$token = str_random(100);
			$file = $request->file('profile_image');
			if($request->file('profile_image')){	
				$destination = "uploads/avatars";
				$userId = Auth::user()->id;
				$filename = $token."_".$userId."_".$file->getClientOriginalName();
				$request->file('profile_image')->move($destination,$filename);
				$data['profile_image'] = $filename;
			}
			$file = $request->file('background_image');
			if($request->file('background_image')){
				$destination = "uploads/background";
				$userId = Auth::user()->id;
				$filename = $token."_".$userId."_".$file->getClientOriginalName();
				$request->file('background_image')->move($destination,$filename);
				$data['background_image'] = $filename;
			}
			if(!empty($request)){	
				if($request->category_id == 0 || $request->location_id == 0){
					$result = DB::table('users')->select("users.*")->where('id',Auth::user()->id)->first();
						if($result->user_type_id == 2){
								$result = DB::table('users')->where('id',Auth::user()->id)->update(['email'=> $request->email, 'user_type_id'=>3, 'porfessional_request'=> 1]);
								$this->email_body .= "Message: Hello Dear Admin,";
								$this->email_subject = "Reqeust to change";
								$flag = false;
								if ($request->category_id == 0) {
									$this->email_body .= "<br/><br/> I am changing the Category";
									 $this->email_subject .= "Category";
								} 
								if ($request->location_id == 0) {
									$this->email_body .= "<br/><br/> I am changing the Location";
									$this->email_subject .= ($flag)?" and ":"";
									$this->email_subject .= " Location ";
								} 
								
								Controller::sendMail('contactwedsetgo@gmail.com');  
								Session::flash('flash_message', 'Your Request has been sent.');
					}
			    }else{
				$result = DB::table('users')->where('id',Auth::user()->id)->update(['email'=> $request->email]);
				}
				$result = DB::table('user_details')->where('user_id',Auth::user()->id)->update($data);
				$user = DB::table('users')->select("porfessional_request", "user_type_id")->where('id',Auth::user()->id)->first();
				if($request->agree == 1){
					$users = DB::table('users')->select('users.porfessional_request','users.user_type_id')->where('id', Auth::user()->id)->first();
					if($user->user_type_id == 3 AND $user->porfessional_request == 0){
						$result = DB::table('users')->where('id',Auth::user()->id)->update(['porfessional_request'=> 1]);
						$this->email_body = "Sender Email: " .Auth::user()->email. "<br/><br/>";
						$this->email_body .= "Message: Hello Dear Admin, <br/><br/> You have a request for professsional account. ";
						$this->email_subject = "Professional Request";
						Controller::sendMail('ranjuzestmind@gmail.com');  
						Session::flash('flash_message', 'Your Request has been sent to site admin.');
					}
				}
				return redirect('edit_profile');
			}
			
		}
		$catagory= DB::table('catagories')->where(['is_active'=>1])->orderBy('name')->lists('name', 'id');
		$catagory[0] = "Other";
		$location= DB::table('locations')->where(['is_active'=>1])->orderBy('location_name')->lists('location_name', 'id');
		$location[0] = "Other";
		//dd($location);
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();
		$followerList=DB::table('followers')->where('professional_id',Auth::user()->id)->where('status',1)->count();
		$followingList=DB::table('followers')->where('buyer_id',Auth::user()->id)->where('status',1)->count();	
		$followlist = Controller::followlist(Auth::user()->id);
		$messageCount = Controller::messageCount(Auth::user()->id);
		$socialVal = unserialize($user->social_media);
		return view('news.edit-profile', array('title' => 'edit-profile', 'catagory'=>$catagory, 'user'=>$user, 'socialVal'=>$socialVal, 'id'=>$id, 'followerList'=>$followerList, 'followingList'=>$followingList, 'location'=>$location,'follower_List'=>$followlist['follower_List'], 'following_List'=>$followlist['following_List'], 'messageCount'=>$messageCount));
	}
	
	public function sendRquestProfessional(){
		$users = DB::table('users')->select('users.porfessional_request')->where('id', Auth::user()->id)->first();
		if($users->porfessional_request==0){
			$result = DB::table('users')->where('id',Auth::user()->id)->update(['porfessional_request'=> 1]);
						$this->email_body = "Sender Email: " .Auth::user()->email. "<br/><br/>";
						$this->email_body .= "Message: Hello Dear Admin, <br/><br/> You have a request for professsional account. ";
						$this->email_subject = "Professional Request";
						Controller::sendMail('contactwedsetgo@gmail.com');  
						Session::flash('flash_message', 'Your Request has been sent to site admin.');
		} else {
			Session::flash('error', 'Request pending Please wait some time');
		}
		return redirect()->route('news.edit-profile');
	}
	
	public function profile(Request $request, $keyword = NULL){
		
		$keyword = explode("-",$keyword);
		$id = $keyword[0];
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', $id)->first();
		$sellerProfile = DB::table('users')->select('users.*',"user_details.profile_image","user_details.first_name","user_details.last_name","user_details.address","user_details.category_id","user_details.detail","user_details.trade_description", "user_details.website", "user_details.social_media","user_details.address","user_details.country","user_details.state",'catagories.name', 'locations.location_name')->join('user_details','user_details.user_id','=','users.id')->leftJoin('catagories','catagories.id' , '=', 'user_details.category_id')->leftJoin('locations','locations.id' , '=', 'user_details.location_id');
		
		$sellerwork = DB::table('user_works')->select('user_works.*','user_work_images.images',"user_details.profile_image")->join('user_work_images','user_work_images.user_work_id','=','user_works.id')->join('user_details','user_details.user_id','=','user_works.user_id');
		if(Auth::check()){
			if (Auth::user()->id == $id){
				$sellerwork = $sellerwork->where('user_works.user_id', Auth::user()->id);
			}else{
				$sellerwork = $sellerwork->where('user_works.status', 1);	
			}
		}else{
			$sellerwork = $sellerwork->where('user_works.status', 1);
		}
		if(Auth::check()){
			if (Auth::user()->id == $id){
				$count = DB::table('user_works')->where('user_works.user_id','=', $id)->count();
			}else{
				$count = DB::table('user_works')->where('user_works.user_id','=', $id)->where('user_works.status', 1)->count();	
			}
		}else{
			$count = DB::table('user_works')->where('user_works.user_id','=', $id)->where('user_works.status', 1)->count();
		}
		$sellerProfile = $sellerProfile->where('users.id','=',$id)->first();
		$socialVal = unserialize($sellerProfile->social_media);
		$sellerwork= $sellerwork->where('user_works.user_id','=', $id)->get();
		if (Auth::check()){
			$follow = DB::table('followers')->select('followers.*')->where('professional_id', "=", $id)->where('buyer_id', "=", Auth::user()->id)->first();
			$messageCount = Controller::messageCount(Auth::user()->id);
			
		}
		$rating = Controller::getRatings($id);
		///dd($rating);
		$followCount = Controller::followCount($id);
		$followlist = Controller::followlist($id);
		Controller::getEmailData('INVITEFRIEND');
		$profile_url = $request->fullUrl();
		$profile_url = strip_tags(str_replace("{LINK}",$profile_url,$this->email_body));
		
		
		if (Auth::check()){
			return view('news.profile', array("title"=>ucwords($user->first_name.' '.$user->last_name),'user'=>$user, 'sellerProfile'=>$sellerProfile, 'sellerwork'=>$sellerwork, 'count'=>$count, 'id'=>$id, 'followerList'=>$followCount['followerList'], 'followingList'=>$followCount['followingList'],'follower_List'=>$followlist['follower_List'], 'following_List'=>$followlist['following_List'],"rating"=>$rating, "follow"=>$follow, "socialVal"=>$socialVal, "profile_url"=>$profile_url, 'messageCount'=>$messageCount));
		} else {
			return view('news.profile', array("title"=>ucwords($user->first_name.' '.$user->last_name),'user'=>$user, 'sellerProfile'=>$sellerProfile, 'sellerwork'=>$sellerwork, 'count'=>$count, 'id'=>$id, 'followerList'=>$followCount['followerList'], 'followingList'=>$followCount['followingList'],'follower_List'=>$followlist['follower_List'], 'following_List'=>$followlist['following_List'],"rating"=>$rating,"socialVal"=>$socialVal, "profile_url"=>$profile_url));
		}
		
	}
	
	public function follower($keyword = NULL){
		$keyword = explode("-",$keyword);
		$id = $keyword[0];
		$users = DB::table('user_details')->select('user_details.*')->where('user_details.user_id',$id)->first();		
		$follower = DB::table('followers')->select('followers.*')->where('buyer_id', Auth::user()->id)->where('professional_id', $id)->first();
		if(empty($follower)){
			Follower::create(array(
			'buyer_id' => Auth::user()->id,
			'professional_id' => $id,
			'status'=>1
        ));
        Session::flash('flash_message', 'You are now following this user');
		}elseif($follower->status == 1){
			$result = DB::table('followers')->where('followers.professional_id',$id)->where('followers.buyer_id',Auth::user()->id)->update(['status'=> 0]);
			Session::flash('flash_message', 'You are not following this user');
		}else{
			$result = DB::table('followers')->where('followers.professional_id',$id)->where('followers.buyer_id',Auth::user()->id)->update(['status'=> 1]);
			Session::flash('flash_message', 'You are now following this user');
		}
		return redirect('/p/'.$id."-".$users->first_name."-".$users->last_name);
		
	}	
	
	public function static_page(Request $request,$slug=NULL){
		$page = $this->get_static_page($slug);
		if (isset($page['term-conditions']) || !empty($page['term-conditions'])){
			//dd($page['term-conditions']);
			//die("here");
			$pageTerm = $page['term-conditions'];
		} else {
			$pageTerm = [];
		}
		//dd($page['term-conditions']);
		return view('news.pagecontent',array("title"=>$page[$slug]->metatitle,"page"=>$page[$slug],"pageTerm"=>$pageTerm));
		
	}
	
}
	/* end of function */

?>
