<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderImage;
use DB;
Use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SliderimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $sliders = DB::table('slider_images')->where ( 'image', 'LIKE', '%' . $request->search_slider . '%' )->paginate(10);
		return view('sliders.index', array('title' => 'List Of Slider Images','sliders'=>$sliders,"path"=>storage_path()));
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
   public function add(Request $request,$id = NULL	 ) {
		if ($request->isMethod('post') || $request->isMethod('put')) {
			$this->validate($request, array(
                                'heading' => 'required|max:255',
                                'description' => 'required|max:255',
                                'image' => 'image:jpg,png|max:5000',
                            ));
			$data = array();
			$file = $request->file('image_file');
			if($request->file('image_file')){
				$destination = "slider/";
				$filename = $file->getClientOriginalName();
				$request->file('image_file')->move($destination,$filename);
				$data['image'] = $filename;
			}
			$data['is_active'] = ($request->is_active == 'on')?1:0;
			$data['heading'] = $request->heading;
			$data['description'] = $request->description;
			if( empty($id) ){
				$result = SliderImage::create($data);
				$flash_message = 'Image created successfully.';
			} else {
				$result = DB::table('slider_images')->where('id',$request->id)->update($data);
				$flash_message = 'Category updated successfully.';
			}
			if ($result) {
				//die("here"); 
				Session::flash('flash_message', $flash_message);
				return redirect()->route('sliders.index');
			} else {
				Session::flash('flash_message', "An error occured, Please try again.");
				return redirect()->route('slider.index');
			}
		} elseif ($request->isMethod('get') && !empty($id)) {
			$slider = DB::table('slider_images')->where('id',$id)->first();
			return view('sliders.add', array('title' => 'Update Slider Image',"slider"=>$slider));
		} else {
			return view('sliders.add', array('title' => 'Add Slider Image')); 
		}
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
        DB::table('slider_images')->where('id', $id)->delete();
		Session::flash('flash_message', 'Record has been delete successfully.');
		return redirect()->route('sliders.index');
    }
}
