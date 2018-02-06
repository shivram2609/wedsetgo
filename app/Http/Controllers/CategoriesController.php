<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$categories = DB::table('catagories')->where ( 'name', 'LIKE', '%' . $request->search_categories . '%' )->paginate(2);
		return view('categories.index', array('title' => 'List Of Catagories','categories'=>$categories,"path"=>storage_path()));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request,$id = NULL	 ) {
		if ($request->isMethod('post') || $request->isMethod('put')) {
			//dd($request->all());
			$this->validate($request, array(
                                'name' => 'required|max:255',
                                'image' => 'image:jpg,png|max:5000',
                            ));
			$data = array();
			$file = $request->file('image_file');
			if($request->file('image_file')){
				$destination = "categories/";
				$filename = $file->getClientOriginalName();
				$request->file('image_file')->move($destination,$filename);
				$data['image'] = $filename;
			}
			$data['name'] = $request->name;
			$data['is_active'] = ($request->is_active == 'on')?1:0;
			if( empty($id) ){
				$result = Catagory::create($data);
				$flash_message = 'Category created successfully.';
			} else {
				$result = DB::table('catagories')->where('id',$request->id)->update($data);
				$flash_message = 'Category updated successfully.';
			}
			if ($result) {
				//die("here"); 
				Session::flash('flash_message', $flash_message);
				return redirect()->route('categories.index');
			} else {
				Session::flash('flash_message', "An error occured, Please try again.");
				return redirect()->route('categories.index');
			}
		} elseif ($request->isMethod('get') && !empty($id)) {
			$category = DB::table('catagories')->where('id',$id)->first();
			return view('categories.add', array('title' => 'Update Category',"category"=>$category));
		} else {
			return view('categories.add', array('title' => 'Add Category')); 
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
		DB::table('catagories')->where('id', $id)->delete();
		Session::flash('flash_message', 'Record has been delete successfully.');
		return redirect()->route('categories.index');	
    }
}
