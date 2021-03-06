<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SliderImage;
use App\Message;
use App\MessageConversation;
use App\Catagory;
use App\Rating;
use DB;
use Session;
use Auth;
class MessageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = NULL){
			
		$id = explode("-",$id);
		$id = $id[0];
		$user = Controller::getUser(Auth::user()->id);
		$messageCount = Controller::messageCount(Auth::user()->id);
		$message= DB::Table('messages')->select('messages.*','udSender.first_name as senderfname','udSender.last_name as senderlname','udReciver.first_name as reciverfname','udReciver.last_name as reciverlname','udSender.profile_image as senderimage','udReciver.profile_image as reciverimage')->join('user_details as udSender', 'udSender.user_id','=','messages.sender_id')->join('user_details as udReciver', 'udReciver.user_id','=','messages.receiver_id')->where("messages.sender_id","=",Auth::user()->id)->orWhere("messages.receiver_id","=",Auth::user()->id)->orderBy("messages.updated_at","desc")->paginate(10);
		//dd($message);
		$count = $message->count();
		$followCount = Controller::followCount(Auth::user()->id);
		$followlist = Controller::followlist(Auth::user()->id);
		return view('message.message', array('title' => 'Message', 'user'=>$user, "id"=>$id,'followerList'=>$followCount['followerList'], 'followingList'=>$followCount['followingList'],'message'=>$message, 'count'=>$count,'follower_List'=>$followlist['follower_List'], 'following_List'=>$followlist['following_List'],'messageCount'=>$messageCount ));
    }
    public function message_list($mid = NULL, Request $request){
		if(!empty($mid)){
			$result = DB::table('message_conversations')->where('message_id',$mid)->update(['is_new'=>0]);
		}
		if ($request->isMethod('post')) {
			$this->validate($request, array(
                                'message' => 'required',
							));
			
			$lastMessage = DB::Table('messages')->select('messages.*')->where('messages.id', $mid)->first();
			$receiver_id = ($lastMessage->sender_id == Auth::user()->id)?$lastMessage->receiver_id:$lastMessage->sender_id;
			//dd($receiver_id);
			$result = DB::table('messages')->where('id',$mid)->update(['last_message'=> $request->message]);
			
			MessageConversation::create(array(
			'sender_id' => Auth::user()->id,
			'message_id' => $mid,
			'message' => $request->message,
			'receiver_id'=> $receiver_id, 
			'is_new'=>1
			));	
			
			$getUSer = DB::table('users')->select('user_details.*','users.email')->join('user_details','user_details.user_id','=','users.id')->where('users.id',$receiver_id)->first();
			Controller::getEmailData('MESSAGE');
			$this->email_body = str_replace("{USER}",ucfirst($getUSer->first_name),$this->email_body);
			$message = $request->message;
			$this->email_body = str_replace("{MESSAGE}",$message,$this->email_body);
			$link = "<a href='".$this->staticLink."message_list/".$mid."'>Click Here to reply</a>";
			$this->email_body = str_replace("{CLICK_HERE}",$link,$this->email_body);
			Controller::sendMail($getUSer->email); 
			Session::flash('flash_message', 'Your message has been send.');
		}
		 
		
		
		$user = Controller::getUser(Auth::user()->id);
		$followCount = Controller::followCount(Auth::user()->id);
		$id= Auth::user()->id;
		$messageCount = Controller::messageCount(Auth::user()->id);
		$listMessage = DB::Table('message_conversations')->select('message_conversations.*','user_details.first_name','user_details.last_name' ,'user_details.profile_image')->join('user_details', 'user_details.user_id', '=', 'message_conversations.sender_id')->where('message_conversations.message_id', $mid)->orderBy('message_conversations.id', 'ASC')->get();
		
		return view('message.message_list', array('title' => 'Message', 'user'=>$user, "id"=>$id,'followerList'=>$followCount['followerList'], 'followingList'=>$followCount['followingList'], "id"=>$id, 'listMessage'=>$listMessage,'messageCount'=>$messageCount));
	}
   
 
   
    public function review($id=NULL){
		
		$id = explode("-",$id);
		$id = $id[0];
		$user = Controller::getUser($id);
		$followCount = Controller::followCount($id);
		$reviews = DB::Table('ratings')->select("comment","rating_points","user_details.first_name","user_details.last_name","user_details.user_id","user_details.profile_image")->join("user_details","user_details.user_id","=","ratings.user_id")->where("ratings.professional_id",$id)->paginate(10);
		$count = $reviews->count();
		//dd($reviews);
		return view('review.review', array('title' => 'Reviews', 'user'=>$user, "id"=>$id,"reviews"=>$reviews,"count"=>$count));
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {		
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user_message(Request $request)
    {
		//dd($request->hidden_user_id);
		if(!empty($request)){
			$this->validate($request, array(
                                'user_message' => 'required',
							));
		 $users = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', $request->hidden_user_id)->first();
			 $message = Message::create(array(
					'sender_id' => Auth::user()->id,
					'receiver_id' => $request->hidden_user_id,
					'last_message'=>$request->user_message,
					'message_count'=>1,
					'is_new'=>1
			));
				MessageConversation::create(array(
				'sender_id' => Auth::user()->id,
				'message_id' => $message->id,
		    	'message' => $request->user_message,
		    	'receiver_id' => $request->hidden_user_id,
				'is_new'=>1
        ));
        if(!empty($message)){
			$msgId = $message->id;
			Controller::getEmailData('MESSAGE');
			$this->email_body = str_replace("{USER}",$users->first_name,$this->email_body);
			$message = $request->user_message;
			$this->email_body = str_replace("{MESSAGE}",$message,$this->email_body);
			$link = "<a href='".$this->staticLink."message_list/".$msgId."'>Click Here to reply</a>";
			$this->email_body = str_replace("{CLICK_HERE}",$link,$this->email_body);
			Controller::sendMail($users->email);   
			Session::flash('flash_message', 'Your message has been send.');	
		}
		return redirect('/p/'.$request->hidden_user_id);
    }
}
 public function rating(Request $request){
	 if ($request->isMethod('post')){
		 $getUserRate = DB::Table('ratings')->select('ratings.*')->where('ratings.professional_id','=',$request->professional_id)->where('ratings.user_id', '=',Auth::user()->id)->where('ratings.status','=',1)->first();
		 if(empty($getUserRate)){
			 Rating::create(array(
					'user_id' => Auth::user()->id,
					'rating_points' => $request->rate_val,
					'professional_id' => $request->professional_id,
					'comment' => $request->review,
					'status' => 1
					));
		}else{
			$values=array('ratings.rating_points'=>$request->rate_val,'ratings.comment'=>$request->review);
			DB::Table('ratings')->where('ratings.professional_id','=',$request->professional_id)->where('ratings.user_id', '=',Auth::user()->id)->update($values);
			
		}
	}
		return redirect('/p/'.$request->professional_id);
	 
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
    public function edit($id)
    {
        //
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
        //
    }
   
    
    
}

