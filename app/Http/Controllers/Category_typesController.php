<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\ValidationException;
use ValidatesRequests;
use App\Category_type;
use Validator;
use Response;
use DB;

class Category_typesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('category_types.index', []);
	}

	public function create(Request $request)
	{
	    return view('category_types.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$category_type = Category_type::findOrFail($id);
	    return view('category_types.add', [
	        'model' => $category_type	    ]);
	}

	public function show(Request $request, $id)
	{
		$category_type = Category_type::findOrFail($id);
	    return view('category_types.show', [
	        'model' => $category_type	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM category_types a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE category_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.category_id) c".$presql);
		//print_r($qcount);
		$count = $qcount[0]->c;

		$results = DB::select($sql);
		$ret = [];
		foreach ($results as $row) {
			$r = [];
			foreach ($row as $value) {
				$r[] = $value;
			}
			$ret[] = $r;
		}

		$ret['data'] = $ret;
		$ret['recordsTotal'] = $count;
		$ret['iTotalDisplayRecords'] = $count;

		$ret['recordsFiltered'] = count($ret);
		$ret['draw'] = $_GET['draw'];

		echo json_encode($ret);

	}


	public function update(Request $request) {
	    
		$rules = array (
            'category_name' => 'required|max:255',
			'status' =>'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){

             return view('category_types.add', [
	                'messages' => $validator->messages()]);
        }
		
		$category_type = null;
		if($request->category_id > 0) { $category_type = Category_type::findOrFail($request->category_id); }
		else { 
			$category_type = new Category_type;
		}
	    

	    		
					    $category_type->category_id = $request->category_id;
		
	    		
					    $category_type->category_name = $request->category_name;
		
	    		
					    $category_type->status = $request->status;
		
	    		
					 //   $category_type->created_at = $request->created_at;
		
	    		
					 //   $category_type->updated_at = $request->updated_at;
		
	    	    //$category_type->user_id = $request->user()->id;
	    $category_type->save();

	    return redirect('/category_types');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$category_type = Category_type::findOrFail($id);

		$category_type->delete();
		return "OK";
	    
	}

	
}