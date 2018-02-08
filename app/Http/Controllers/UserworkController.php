<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\CaptchaTrait;
use App\User;
use App\UserDetail; 
use App\UserWork;
use App\UserWorkImage; 
use App\VisionBook;
use App\VisionBookCollection; 
use Session;
use Catagory;
use Auth;
use Config;
use DB;
use Socialite;
use App\Follower;
 
class UserworkController extends Controller{
	public function index(Request $request)
    { 
		
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();
		
		$catagory= DB::table('catagories')->where(['is_active'=>1])->orderBy('name')->lists('name', 'id');
		if(empty($request->catagory_id)){
		$userwork = DB::table('user_works')->select('user_works.*','user_work_images.images',"user_details.profile_image")->join('user_work_images','user_work_images.user_work_id','=','user_works.id')->join('user_details','user_details.user_id','=','user_works.user_id')->where('user_works.user_id', Auth::user()->id)->get();
		} else {
		$userwork = DB::table('user_works')->select('user_works.*','user_work_images.images',"user_details.profile_image")->join('user_work_images','user_work_images.user_work_id','=','user_works.id')->join('user_details','user_details.user_id','=','user_works.user_id')->where('user_works.user_id', Auth::user()->id)->where('user_works.catagory_id',$request->catagory_id )->get();
		}
		$followerList=DB::table('followers')->where('professional_id',Auth::user()->id)->where('status',1)->count();
		$followingList=DB::table('followers')->where('buyer_id',Auth::user()->id)->where('status',1)->count();	
        return view('userwork.user_work', array('user'=>$user, 'userwork'=>$userwork, 'catagory'=>$catagory, 'title' => 'User Works', "id"=>Auth::user()->id ,'followerList'=>$followerList, 'followingList'=>$followingList));   
    }
   
    public function add(Request $request,$id = NULL)
    {
		$catagory= DB::table('catagories')->where(['is_active'=>1])->orderBy('name')->lists('name', 'id');
		
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();
		
		$user_work = DB::table('user_works')->select('user_works.*','user_work_images.images',"user_details.profile_image", 'catagories.name')->join('user_work_images','user_work_images.user_work_id','=','user_works.id')->join('user_details','user_details.user_id','=','user_works.user_id')->join('catagories','catagories.id' , '=', 'user_works.catagory_id')->where('user_works.id',$id)->first();

		if ($request->isMethod('post')){
			$this->validate($request, array(
                                'description' => 'required',
                                'catagory_id' => 'required',
                                'title' => 'required',
                                'tag' => 'required',
                            ));
                            
            $file = $request->file('image_file');
			if($request->file('image_file')){
				$destination = "work_image/";
				$filename = $file->getClientOriginalName();
				$request->file('image_file')->move($destination,$filename);
			}
				if(empty($id)){
					$userwork = UserWork::create(array(
					'user_id' => Auth::user()->id,
					'catagory_id' => $request->catagory_id,
					'description' => $request->description,
					'title' => $request->title,
					'tag' => $request->tag,
					'status' => 1,
					));
					 if($userwork){
					UserWorkImage::create(array(
								'user_work_id'=>$userwork->id,
								'images' => $filename
							));
					}
				Session::flash('flash_message', 'Work add successfully');
				return redirect()->route('userwork.user_work');
			} else{
				$result = DB::table('user_works')->where('id',$id)->update(['title' => $request->title],['catagory_id' => $request->catagory_id], ['description' =>$request->description ]);
				if(!empty($filename)){
					$result = DB::table('user_work_images')->where('user_work_id',$id)->update(['images' => $filename]);
					return redirect()->route('userwork.user_work');
				}
				Session::flash('flash_message', 'Work update successfully');
				return redirect()->route('userwork.user_work');
			}
		}elseif ($request->isMethod('get') && !empty($id)) { 
				return view('userwork.add_work', array('user_work'=>$user_work,'catagory'=>$catagory, 'user'=>$user, 'title' => 'Update Work', "id"=>$id));
		} else {
			return view('userwork.add_work', array('catagory'=>$catagory, 'user'=>$user, 'title' => 'Add Work', "id"=>$id)); 
		}
		
  }
  
	  public function photostream_gridview(Request $request){
		  $view = $tmpQuery = $request->query();
		  $view = isset($view['view'])?$view['view']:'grid';
		  if ( isset($tmpQuery['view']) ) {
			  unset($tmpQuery['view']);
		  }
		  $pageCount = ($view == ("full_view")?1:((isset($tmpQuery['record_per_page']) && !empty($tmpQuery['record_per_page']))?$tmpQuery['record_per_page']:6));
		  $tmpQString = '';
		  if (!empty($tmpQuery)) {
			  if ($view == "full_view") {
				  unset($tmpQuery['page']);
			  }
			  foreach ( $tmpQuery as $key=>$val ) {
				  $tmpQString .= "&".$key."=".$val;
			  }
		   }
		  $catagory= DB::table('catagories')->where(['is_active'=>1])->orderBy('name')->lists('name', 'id');
		  $searchEntity = DB::table('user_works')->select('user_works.*','user_work_images.images',"user_details.profile_image","user_details.first_name","user_details.last_name","user_details.address",'catagories.name')->join('user_work_images','user_work_images.user_work_id','=','user_works.id')->join('user_details','user_details.user_id','=','user_works.user_id')->join('catagories','catagories.id' , '=', 'user_works.catagory_id')->where('user_works.status',1);
		  if (isset($tmpQuery['catagory_id']) && !empty($tmpQuery['catagory_id'])) {
				$searchEntity->where('user_works.catagory_id','=', $tmpQuery['catagory_id']);
		  }
		  if (isset($tmpQuery['sort_by']) && !empty($tmpQuery['sort_by'])) {
				if($tmpQuery['sort_by']== 'Newest'){
					$searchEntity->orderBy('user_works.created_at', 'desc');
				} else {
					$searchEntity->orderBy('user_works.created_at', 'asc');
			    }
		  }
		  if (isset($tmpQuery['search_key']) && !empty($tmpQuery['search_key'])) {
			 // die("here");
			  $keyword = $tmpQuery['search_key'];
			  $searchEntity->where(function($q) use ($keyword){
					$q->orWhere('user_details.first_name', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('user_details.last_name', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('user_works.description', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('user_works.title', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('catagories.name', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('user_works.tag', 'LIKE', '%'.$keyword.'%');
				});
		  }
		  
		  /*
		  ->where(function($q) use ($keyword){
						                     $q->orWhere('user_details.first_name', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('user_details.last_name', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('user_works.description', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('user_works.title', 'LIKE', '%'.$keyword.'%');
				                             $q->orWhere('catagories.name', 'LIKE', '%'.$keyword.'%');
			                                }
		)*/
		$userphotogrid = $searchEntity->paginate($pageCount);
		  
		  return view('userwork.photostream_gridview', array('tmpQuery'=>$tmpQuery,'tmpQString'=>$tmpQString,'view'=>$view,'request'=>$request,'title' => 'Photo Stream', 'userphotogrid'=>$userphotogrid, 'catagory'=>$catagory)); 
	 }
	 
	 public function add_vision_book(Request $request, $id=NULL){
		 	 
		 $id = explode("-",$id);
		 $id = $id[0];
		 if(Auth::check()){
			$visionbook= DB::table('vision_books')->where('user_id', '=',Auth::user()->id )->orderBy('vision_title')->lists('vision_title', 'id');
		}
		 $userphotogrid = DB::table('user_works')->select('user_works.*','user_work_images.images',"user_details.profile_image","user_details.first_name","user_details.last_name","user_details.address",'catagories.name')->join('user_work_images','user_work_images.user_work_id','=','user_works.id')->join('user_details','user_details.user_id','=','user_works.user_id')->join('catagories','catagories.id' , '=', 'user_works.catagory_id')->where('user_works.id','=', $id)->first();
		 $source = "work_image/".$userphotogrid->images;
		 $token = str_random(100);
		 if(Auth::check()){
				$filename = $token."_".Auth::user()->id."_".$userphotogrid->images;
				$destination = "visionbook_images/".$filename;
			
			 if ($request->isMethod('post')){
				 if(!empty($id) && !empty($userphotogrid)  ){
					 if ( copy($source,$destination) ) {
							if(empty($request->vision_book_id)){
								$visionbook = VisionBook::create(array(
								'user_id' => Auth::user()->id,
								'vision_title' => $request->vision_title,
								));
								$tmp_id = $visionbook->id;
							} else {
								$tmp_id = $request->vision_book_id;
							}
							
						VisionBookCollection::create(array(
										'vision_book_id'=>$tmp_id,
										'old_title' => $userphotogrid->title,
										'old_description' => $userphotogrid->description,
										'images' => $filename,
										'comments' => $request->comments,
										'user_work_id'=>$userphotogrid->id,
										
									));
						Session::flash('flash_message', 'Add in vision book successfuly');
						return redirect()->route('userwork.photostream_gridview');
					} else {
						Session::flash('flash_message', ' Not add in vision book');
					}
				}
			}
	}
		if(Auth::check()){
		 return view('userwork.add_vision_book', array('title' => 'User Works', 'userphotogrid'=>$userphotogrid, 'visionbook'=>$visionbook, "id"=>$id, "url"=>$request->fullUrl())); 
	 }
		 return view('userwork.add_vision_book', array('title' => 'User Works', 'userphotogrid'=>$userphotogrid, "url"=>$request->fullUrl())); 
	 }
	 
	public function my_vision_book(){
		$user = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('user_details.user_id', Auth::user()->id)->first();	
		$myVisionBook= DB::table('vision_books')->select('vision_books.*','vision_book_collections.images','vision_book_collections.old_title','vision_book_collections.comments')->join('vision_book_collections','vision_book_collections.vision_book_id','=','vision_books.id')->where('vision_books.user_id','=', Auth::user()->id)->get();		
		 return view('userwork.my_vision_book', array('title' =>'MY Vision Book', 'user'=>$user, 'myVisionBook'=>$myVisionBook, "id"=>Auth::user()->id));
	}
	
	public function seller_listing(Request $request){
		$view = $tmpQuery = $request->query();
		  $view = isset($view['view'])?$view['view']:'grid';
		  if ( isset($tmpQuery['view']) ) {
			  unset($tmpQuery['view']);
		  }
		  $pageCount = ($view == ("full_view")?1:((isset($tmpQuery['record_per_page']) && !empty($tmpQuery['record_per_page']))?$tmpQuery['record_per_page']:5));
		  $tmpQString = '';
		  if (!empty($tmpQuery)) {
			  
			  foreach ( $tmpQuery as $key=>$val ) {
				  $tmpQString .= "&".$key."=".$val;
			  }
		   }
		 
		  $catagory= DB::table('catagories')->where(['is_active'=>1])->orderBy('name')->lists('name', 'id');
		  $templist = DB::table('users')->select('users.*',"user_details.profile_image","user_details.first_name","user_details.last_name","user_details.address","user_details.category_id","user_details.detail",'catagories.name')->join('user_details','user_details.user_id','=','users.id')->join('catagories','catagories.id' , '=', 'user_details.category_id')->where('users.user_type_id','=', 2);
		  
		   if (isset($tmpQuery['catagory_id']) && !empty($tmpQuery['catagory_id'])) {
				$templist->where('user_details.category_id','=', $tmpQuery['catagory_id']);
		  }
		  if (isset($tmpQuery['search_key']) && !empty($tmpQuery['search_key'])) {
			 // die("here");
			  $keyword = $tmpQuery['search_key'];
			  $templist->where(function($q) use ($keyword){
					$q->orWhere('user_details.first_name', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('user_details.last_name', 'LIKE', '%'.$keyword.'%');
					$q->orWhere('user_details.detail', 'LIKE', '%'.$keyword.'%');
				});
		  }
			$sellerList = $templist->paginate($pageCount);
		 return view('userwork.seller_listing', array('title' =>'Seller', 'tmpQuery'=>$tmpQuery,'tmpQString'=>$tmpQString, "catagory"=>$catagory,'view'=>$view, 'sellerList'=>$sellerList));
		
	}
		
}
?>
