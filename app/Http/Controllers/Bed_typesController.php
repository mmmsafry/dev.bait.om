<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ValidatesRequests;
use App\Bed_type;
use Validator;
use Response;
use DB;

class Bed_typesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('bed_types.index', []);
	}

	public function create(Request $request)
	{
	    return view('bed_types.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$bed_type = Bed_type::findOrFail($id);
	    return view('bed_types.add', [
	        'model' => $bed_type	    ]);
	}

	public function show(Request $request, $id)
	{
		$bed_type = Bed_type::findOrFail($id);
	    return view('bed_types.show', [
	        'model' => $bed_type	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM bed_types a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE bed_type_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.bed_type_id) c".$presql);
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
            'bed_type_name' => 'required|max:255',
			'status' =>'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){

             return view('category_types.add', [
	                'messages' => $validator->messages()]);
        }
		$bed_type = null;
		if($request->bed_type_id > 0) { $bed_type = Bed_type::findOrFail($request->bed_type_id); }
		else { 
			$bed_type = new Bed_type;
		}
	    

	    		
					    $bed_type->bed_type_id = $request->bed_type_id;
		
	    		
					    $bed_type->bed_type_name = $request->bed_type_name;
		
	    		
					    $bed_type->status = $request->status;
		
	    		
					   // $bed_type->created_at = $request->created_at;
		
	    		
					  //  $bed_type->updated_at = $request->updated_at;
		
	    	    //$bed_type->user_id = $request->user()->id;
	    $bed_type->save();

	    return redirect('/bed_types');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$bed_type = Bed_type::findOrFail($id);

		$bed_type->delete();
		return "OK";
	    
	}

	
}