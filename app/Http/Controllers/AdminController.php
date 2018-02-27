<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Message;
use App\MessageConversation;
use Session;
use App\UserDetail; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admindashboard(Request $request)
    {    
		return view('admin.admindashboard', array('title' => 'Admin Dashboard'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//$users = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('users.email', 'LIKE', '%' . $request->search_user . '%')->orWhere('user_details.first_name', 'LIKE', '%' . $request->search_user . '%')->where('users.user_type_id','!=', 1)->paginate(10);
		$keyword = $request->search_user;
		$users = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('users.user_type_id','!=', 1)->where(function($q) use ($keyword){
						                     $q->orWhere('user_details.first_name', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('users.email', 'LIKE', '%'.$keyword.'%');
			                                }
		)->paginate(10);
		
       return view('admin.admin_userlist', array('title' => 'User List', 'users'=>$users ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id=NULL)
    {
		if ($request->isMethod('post') || $request->isMethod('put') || empty($id)) {
			  $data = array();           
			  $data['is_active'] = ($request->is_active == 'on')?1:0;
			  if( !empty($id) ){
				$result = DB::table('users')->where('id',$request->id)->update($data);
				Session::flash('flash_message','User updated successfully.');
				return redirect()->route('admin.admin_userlist');
			  } else {
				Session::flash('flash_message','An error occured, Please try again.');
				return redirect()->route('admin.admin_userlist');
				}
		} else {			
				$users = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('users.id', $request->id)->first();
				return view('admin.edit', array('title' => 'Update User',"users"=>$users));
		}
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		DB::table('user_details')->join('user_details','user_details.user_id','=','users.id')->where('users.id', $id)->delete();
		DB::table('users')->where('id', $id)->delete();
		Session::flash('flash_message', 'Record has been delete successfully.');
		return redirect()->route('admin.admin_userlist');	
    }
    
    public function professionalList(Request $request){
		$professionals = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('porfessional_request', 1)->where('users.email', 'LIKE', '%' . $request->search_professional . '%')->paginate(10);
       return view('admin.professional_list', array('title' => 'Professional List', 'professionals'=>$professionals ));
	}
	
	public function viewProfessionalList(Request $request, $id){
		$viewProfessionals = DB::table('users')->select('user_details.*','users.*', 'catagories.name')->join('user_details','user_details.user_id','=','users.id')->leftJoin('catagories','catagories.id','=','user_details.category_id')->where('users.id', $id)->first();
		$socialVal = unserialize($viewProfessionals->social_media);
		return view('admin.view_professional', array('title' => 'Professional List', 'viewProfessionals'=>$viewProfessionals, 'socialVal'=>$socialVal ));
	}
	public function approveProfessionalrequest($id=NULL,$is_approve = NULL){
		$type = empty($is_approve)?3:2;
		$result = DB::table('users')->where('id',$id)->update(['porfessional_request'=> 0,'user_type_id'=>$type]);
		if(!empty($result)){
			$users = DB::table('users')->select('user_details.*','users.email')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', $id)->first();
			$this->email_body .= "Dear " .ucwords($users->first_name.' '.$users->last_name).",<br/><br/>";
			if (empty($is_approve)) { 
				$this->email_body .= " Your Request can not be approved at the momment. try again in future. ";
				$this->email_subject = "Professional Request Rejected";
			} else {
				$this->email_body .= " Your Request has been approved for professional account. Now you can continue your job. ";
				$this->email_subject = "Professional Request Approved";
			}
			
			Controller::sendMail($users->email);  
			Session::flash('flash_message', 'Your Request has been sent.');
		} else {
			Session::flash('error_message', 'error occured.');
		}
		return redirect()->route('admin.admin_userlist');
		
	}
	public function more_info(Request $request, $id){
			$users = DB::table('users')->select('user_details.*','users.email')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', $id)->first();
			if ($request->isMethod('Post')){
				$this->validate($request, array(
									'information' => 'required',
                            ));
               $message= Message::create(array(
						'sender_id' => Auth::user()->id,
						'receiver_id'=>$id,
						'last_message' => $request->information, 
						'is_new'=>1
					));
						MessageConversation::create(array(
						'sender_id' => Auth::user()->id,
						'message_id' => $message->id,
						'message' => $request->information,
						'is_new'=>1
				   ));
				$this->email_body .= "Dear " .ucwords($users->first_name.' '.$users->last_name).",<br/><br/>"; 
				$this->email_body .= "We have reviewed your application, we need more information about yourself as below:<br/><br/>" .$request->information;
				$this->email_subject = "More Information Request for Professional";
				Controller::sendMail($users->email);  
				Session::flash('flash_message', 'Your Request has been sent.');
				return redirect()->route('admin.admin_userlist');
			} else {
				Session::flash('error_message', 'error occured.');			
				return view('admin.more_info', array('title' => 'Professional More Information','id'=>$id));
			}
	}
	
	public function professionalWorkList(Request $request){
		$keyword = $request->search_professional;
		$professionalWorkList = DB::table('users')->select('users.user_type_id','user_works.*','user_work_images.images',"user_details.profile_image","user_details.first_name","user_details.last_name","user_works.title",'catagories.name')->join('user_details','user_details.user_id','=','users.id')->Leftjoin('catagories','catagories.id' , '=', 'user_details.category_id')->join('user_works','user_works.user_id' , '=', 'users.id')->join('user_work_images','user_work_images.user_work_id' , '=', 'user_works.id')->where('users.user_type_id','=', 2)->where('users.is_active','=', 1)->where(function($q) use ($keyword){
			
						                     $q->orWhere('user_details.first_name', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('user_details.last_name', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('catagories.name', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('user_works.title', 'LIKE', '%'.$keyword.'%');
			                                })->paginate(5);
		return view('admin.professionalwork', array('title' => 'Professional Work List', 'professionalWorkList'=>$professionalWorkList));
	}
	
	
	public function viewProfessionalWorkList(Request $request, $id){
		$viewprofessionalWorkList = DB::table('users')->select('users.user_type_id','user_works.*','user_work_images.images',"user_details.profile_image","user_details.first_name","user_details.last_name","user_works.title",'catagories.name')->join('user_details','user_details.user_id','=','users.id')->Leftjoin('catagories','catagories.id' , '=', 'user_details.category_id')->join('user_works','user_works.user_id' , '=', 'users.id')->join('user_work_images','user_work_images.user_work_id' , '=', 'user_works.id')->where('user_works.id', $id)->first();
		return view('admin.viewProfessional_work_list', array('title' => 'View Professional Work List', 'viewprofessionalWorkList'=>$viewprofessionalWorkList,));
	}
	
	public static function update_user_status($id=NULL, $status=NULL){
		$status = empty($status)?1:0;
		$result = DB::table('user_works')->where('id',$id)->update(['status'=> $status]);
		Session::flash('flash_message', 'Professional Work Status update successfully.');
		return redirect()->route('admin.professionalwork');
	}
	public static function update_is_featured($id=NULL, $is_featured=NULL){
		$is_featured = empty($is_featured)?1:0;
		$result = DB::table('user_works')->where('id',$id)->update(['is_featured'=> $is_featured]);
		Session::flash('flash_message', 'Professional work add to home page successfully.');
		return redirect()->route('admin.professionalwork');
	}
	
	  public function admin_message(){
		  
		  $message= DB::Table('messages')->select('messages.*','udSender.first_name as senderfname','udSender.last_name as senderlname','udReciver.first_name as reciverfname','udReciver.last_name as reciverlname','udSender.profile_image as senderimage','udReciver.profile_image as reciverimage')->join('user_details as udSender', 'udSender.user_id','=','messages.sender_id')->join('user_details as udReciver', 'udReciver.user_id','=','messages.receiver_id')->where("messages.sender_id","=",Auth::user()->id)->orWhere("messages.receiver_id","=",Auth::user()->id)->orderBy("messages.updated_at","desc")->paginate(10);
		  return view('admin.message', array('title' => 'Messages List', "message"=>$message));
	  }
	  
	  public function admin_message_list($mid = NULL, Request $request){
		
		if ($request->isMethod('post')) {
			       $result = DB::table('messages')->where('id',$mid)->update(['last_message'=> $request->message]);
					MessageConversation::create(array(
					'sender_id' => Auth::user()->id,
					'message_id' => $mid,
					'message' => $request->message
					));	
				}
		
		$listMessage = DB::Table('message_conversations')->select('message_conversations.*','user_details.first_name','user_details.last_name' ,'user_details.profile_image')->join('user_details', 'user_details.user_id', '=', 'message_conversations.sender_id')->where('message_conversations.message_id', $mid)->get();
		
		return view('admin.admin_message_list', array('title' => 'Message', 'listMessage'=>$listMessage));
	}
}
