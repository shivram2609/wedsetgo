<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cmsemail;
use App\Catagory;
use Mail;
use DB;
use Auth;
use View;
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $email_body = '';
    public $email_from = 'ranjana@zestminds.com';
    public $email_subject = 'test';
    public $staticLink = "http://wedsetgo.zestminds.com:8000/";
    //public $staticLink = "http://35.154.146.218:8000/";
    public $email_title = "WedSetGo";
    
    function __construct(Request $request) {
		$headCategory =  DB::table('catagories')->where(['is_active'=>1])->get();
		//dd($request->url());
		View::share('headCategory', $headCategory);
		View::share('url', $request->url());
		
		if ( Auth::check()) {
			//echo Auth::user()->id;
			$userfile= $this->getUser(Auth::user()->id);
			$userProfile= url("/p/$userfile->user_id-$userfile->first_name-$userfile->last_name");
			View::share('userProfile', $userProfile);
		}else{
			View::share('userProfile', $request->url());
		}
		
		if ( Auth::check()) {
			//echo Auth::user()->id;
			$userDetail = $this->getUser(Auth::user()->id);
			View::share('userDetail', $userDetail);
		}
	}
    
    public function getEmailData( $slug = NULL ) {
		
		$data = DB::table('cmsemails')->select('cmsemails.*')->where(['cmsemails.slug'=>$slug])->first();
		$this->email_body = $data->content;
		$this->email_from = $data->emailfrom;
		$this->email_subject = $data->subject;
		$this->email_title = $data->title;
	}
    
    
    public function sendMail( $to = NULL, $template = "emails.emailtemplate" ) {
		$data = array(
			"email"=> $to,
			"email_content" => $this->email_body
		);
		try {
			$flag = Mail::send($template,$data, function($message) use ($data)
			{
				$message->from($this->email_from, $this->email_title);
				$message->subject($this->email_subject);
				$message->to($data['email']);
			});
			if ( $flag ) {
				return true;
			} else {
				throw new Exception;
			}
		} catch (Exception $e) {
			//echo $e->getMessage();
			//die;
			return false;
		} 	
	}
	
	
	function followCount($uId = NULL) {
		$array['followerList']=DB::table('followers')->where('professional_id',$uId)->where('status',1)->count();
		$array['followingList']=DB::table('followers')->where('buyer_id',$uId)->where('status',1)->count();
		return $array;
	}
	function followlist($uId = NULL) {
		//dd("here");
		$array['follower_List'] =DB::table('followers')->join("user_details","followers.buyer_id","=","user_details.user_id")->where('professional_id',$uId)->where('status',1)->get();
		$array['following_List']=DB::table('followers')->join("user_details","followers.professional_id","=","user_details.user_id")->where('buyer_id',$uId)->where('status',1)->get();
		return $array;
		
	}
	
	function getUser($uid = NULL){
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', $uid)->first();
		return $user;
	}
	
	function getRatings($professional_id=NULL){
		if(Auth::check()){
		 $array['getProfessionalRate'] = DB::Table('ratings')->select('ratings.*')->where('ratings.professional_id','=',$professional_id)->where('ratings.user_id', '=',Auth::user()->id)->where('ratings.status','=',1)->first();
		 }
		$array['aggregateRating'] = DB::Table('ratings')->where('ratings.professional_id','=',$professional_id)->where('ratings.status','=',1)->avg("rating_points");
		return $array;
	}
	
	
	
}
