<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
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
		$users = DB::table('users')->select('user_details.*','users.*')->join('user_details','user_details.user_id','=','users.id')->where('users.user_type_id','!=', 1)->where('users.email', 'LIKE', '%' . $request->search_user . '%')->orWhere('user_details.first_name', 'LIKE', '%' . $request->search_user . '%')->paginate(10);
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
		DB::table('user_details')->where('user_details.user_id', $id)->delete();
		DB::table('users')->join('user_details','user_details.user_id','=','users.id')->where('users.id', $id)->delete();
		Session::flash('flash_message', 'Record has been delete successfully.');
		return redirect()->route('admin.admin_userlist');	
    }
}
