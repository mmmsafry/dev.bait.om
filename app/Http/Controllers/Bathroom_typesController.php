<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ValidatesRequests;
use App\Bathroom_type;
use Validator;
use Response;
use DB;

class Bathroom_typesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('bathroom_types.index', []);
	}

	public function create(Request $request)
	{
	    return view('bathroom_types.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$bathroom_type = Bathroom_type::findOrFail($id);
	    return view('bathroom_types.add', [
	        'model' => $bathroom_type	    ]);
	}

	public function show(Request $request, $id)
	{
		$bathroom_type = Bathroom_type::findOrFail($id);
	    return view('bathroom_types.show', [
	        'model' => $bathroom_type	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM bathroom_types a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE bathroom_type_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.bathroom_type_id) c".$presql);
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
	    //
	         $rules = array (
                        'bathroom_type_name' => 'required|max:255',
			'status' =>'required'
                             );
                $validator = Validator::make($request->all(), $rules);
                if ($validator-> fails()){

                     return view('bathroom_types.add', [
                                'messages' => $validator->messages()]);
                }
                
		$bathroom_type = null;
		if($request->bathroom_type_id > 0) { $bathroom_type = Bathroom_type::findOrFail($request->bathroom_type_id); }
		else { 
			$bathroom_type = new Bathroom_type;
		}
	    
	    		
                    $bathroom_type->bathroom_type_id = $request->bathroom_type_id;


                    $bathroom_type->bathroom_type_name = $request->bathroom_type_name;


                    $bathroom_type->status = $request->status;


                //    $bathroom_type->created_at = $request->created_at;


                //    $bathroom_type->updated_at = $request->updated_at;

                //    $bathroom_type->user_id = $request->user()->id;
                    
	    $bathroom_type->save();

	    return redirect('/bathroom_types');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$bathroom_type = Bathroom_type::findOrFail($id);

		$bathroom_type->delete();
		return "OK";
	    
	}

	
}