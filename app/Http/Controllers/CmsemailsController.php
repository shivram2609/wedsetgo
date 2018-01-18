<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class CmsemailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
			$cmsemails = DB::table('cmsemails')->where ( 'subject', 'LIKE', '%' . $request->search_emails . '%' )->paginate(2);
			return view('cmsemails.admin_index', array('title' => 'List Of Cmsemails','cmsemails'=>$cmsemails));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
			  $this->validate($request, array(
								'title' => 'required|max:255',
								'subject' => 'required',
								'emailfrom' => 'required|email|max:255',
								'editor' => 'required',
								));
			  $data = array();  
			  $data['title'] = $request->title;             
			  $data['subject'] = $request->subject;             
			  $data['emailfrom'] = $request->emailfrom;             
			  $data['content'] = $request->editor;
			  if( !empty($id) ){
				$result = DB::table('cmsemails')->where('id',$request->id)->update($data);
				Session::flash('flash_message','Cmsemails updated successfully.');
				return redirect()->route('cmsemails.admin_index');
			  } else {
				Session::flash('flash_message','An error occured, Please try again.');
				return redirect()->route('cmsemails.admin_index');
				}
		} else {			
				$cmsemails = DB::table('cmsemails')->where('id',$id)->first();
				return view('cmsemails.edit', array('title' => 'Edit page',"cmsemails"=>$cmsemails));
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
        //
    }
}
