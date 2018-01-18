<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SliderImage;
use App\Catagory;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$slider =  DB::table('slider_images')->where(['is_active'=>1])->get();
		$catgagory =  DB::table('catagories')->where(['is_active'=>1])->get();
        return view('home', array('title' => 'Home', 'slider'=>$slider, 'catgagory'=>$catgagory));
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
    
    public function contactus(Request $request){
		if ($request->isMethod('post')) {		
			$this->validate($request, array(
                            'firstname' => 'required|max:255',
                            'email' => 'required|email|max:255',
                            'message' => 'required',
                            ));
                     if(!empty($request)){
						$this->email_body = "Sender Name: " .$request['firstname']. "<br/><br/>" ;
						$this->email_body .= "Sender Email: " .$request['email']. "<br/><br/>";
						$this->email_body .= "Message: " .nl2br($request['message']);
						$this->email_subject = "Contact Request regarding ";
						Controller::sendMail('ranjuzestmind@gmail.com');  
						Session::flash('flash_message', 'Your message send successffuly.');
					}
					
		 } 
	  return view('news.contact-us', array('title' => 'Contact-us' ));
	}
}
