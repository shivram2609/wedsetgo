<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cmspage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class CmspagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = DB::table('cmspages')->where ( 'name', 'LIKE', '%' . $request->search_pages . '%' )->paginate(10);
		return view('cmspages.admin_index', array('title' => 'List Of Cmspages','pages'=>$pages));
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
    public function add(Request $request, $id = NULL)
    {
		if ($request->isMethod('post') || $request->isMethod('put')) {
		  $this->validate($request, array(
							'name' => 'required|max:255',
                            'editor' => 'required',
                            'metatitle' => 'required|max:255',
                            'seourl' => 'required|max:255',
                            'metadesc' => 'required|max:255',
                            'metakeyword' => 'required|max:255',
               
                            ));
         $data = array();
         $data['name'] = $request->name;
         $data['content'] = $request->editor;
         $data['metatitle'] = $request->metatitle;
         $data['seourl'] = $request->seourl;
         $data['metadesc'] = $request->metadesc;
         $data['metakeyword'] = $request->metakeyword;
         $data['status'] = ($request->is_active == 'on')?1:0;
         if( empty($id) ){
				$result = Cmspage::create($data);
				$flash_message = 'Cmspages created successfully.';
			} else {
				$result = DB::table('cmspages')->where('id',$request->id)->update($data);
				$flash_message = 'Cmspages updated successfully.';
			}
			if ($result) {
				//die("here"); 
				Session::flash('flash_message', $flash_message);
				return redirect()->route('cmspages.admin_index');
			} else {
				Session::flash('flash_message', "An error occured, Please try again.");
				return redirect()->route('cmspages.admin_index');
			}
		} elseif ($request->isMethod('get') && !empty($id)) {
			$pages = DB::table('cmspages')->where('id',$id)->first();
			return view('cmspages.add', array('title' => 'Update page',"pages"=>$pages));
		} else {
			return view('cmspages.add', array('title' => 'Add page')); 
		}
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
        DB::table('cmspages')->where('id', $id)->delete();
		Session::flash('flash_message', 'Record has been delete successfully.');
		return redirect()->route('cmspages.admin_index');
    }
}
