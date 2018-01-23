<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ValidatesRequests;
use App\Furniture_type;
use Validator;
use Response;
use DB;

class Furniture_typesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('furniture_types.index', []);
	}

	public function create(Request $request)
	{
	    return view('furniture_types.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$furniture_type = Furniture_type::findOrFail($id);
	    return view('furniture_types.add', [
	        'model' => $furniture_type	    ]);
	}

	public function show(Request $request, $id)
	{
		$furniture_type = Furniture_type::findOrFail($id);
	    return view('furniture_types.show', [
	        'model' => $furniture_type	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM furniture_types a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE furniture_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.furniture_type_id) c".$presql);
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
                        'furniture_name' => 'required|max:255',
			'status' =>'required'
                             );

        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){

             return view('furniture_types.add', [
	                'messages' => $validator->messages()]);
        }
		$furniture_type = null;
		if($request->furniture_type_id > 0) { $furniture_type = Furniture_type::findOrFail($request->furniture_type_id); }
		else { 
			$furniture_type = new Furniture_type;
		}
	    

	    		
                $furniture_type->furniture_type_id = $request->furniture_type_id;


                $furniture_type->furniture_name = $request->furniture_name;


                $furniture_type->status = $request->status;


              //  $furniture_type->created_at = $request->created_at;


               // $furniture_type->updated_at = $request->updated_at;

              //$furniture_type->user_id = $request->user()->id;
                
	      $furniture_type->save();

	    return redirect('/furniture_types');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$furniture_type = Furniture_type::findOrFail($id);

		$furniture_type->delete();
		return "OK";
	    
	}

	
}