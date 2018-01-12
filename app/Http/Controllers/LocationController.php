<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class LocationController extends Controller
{
    public function index(Request $request){
		$locations = DB::table('locations')->where ( 'location_name', 'LIKE', '%' . $request->search_locations . '%' )->paginate(4);
		return view('locations.index', array('title' => 'Locations','locations'=>$locations));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request,$id = NULL	 ) {
		
		if ($request->isMethod('post') || $request->isMethod('put')) {
			$this->validate($request, array(
                                'name' => 'required|max:255',
                            ));
			$data = array();
			$data['location_name'] = $request->name;
			if( empty($id) ){
				$result = Location::create($data);
				$flash_message = 'Location created successfully.';
			} else {
				$result = DB::table('locations')->where('id',$request->id)->update($data);
				$flash_message = 'Location updated successfully.';
			}
			if ($result) {
				//die("here"); 
				Session::flash('flash_message', $flash_message);
				return redirect()->route('locations.index');
			} else {
				Session::flash('flash_message', "An error occured, Please try again.");
				return redirect()->route('locations.index');
			}
		} elseif ($request->isMethod('get') && !empty($id)) {
			$location = DB::table('locations')->where('id',$id)->first();
			return view('locations.add', array('title' => 'Edit location',"location"=>$location));
		} else {
			return view('locations.add', array('title' => 'Add location')); 
		}
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
		DB::table('locations')->where('id', $id)->delete();
		Session::flash('flash_message', 'Record has been delete successfully.');
		return redirect()->route('locations.index');	
    }
}
