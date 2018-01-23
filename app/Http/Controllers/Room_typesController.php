<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ValidatesRequests;
use App\Room_type;
use Validator;
use Response;
use DB;

class Room_typesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('room_types.index', []);
	}

	public function create(Request $request)
	{
	    return view('room_types.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$room_type = Room_type::findOrFail($id);
	    return view('room_types.add', [
	        'model' => $room_type	    ]);
	}

	public function show(Request $request, $id)
	{
		$room_type = Room_type::findOrFail($id);
	    return view('room_types.show', [
	        'model' => $room_type	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM room_types a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE room_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.room_type_id) c".$presql);
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
                        'room_name' => 'required|max:255',
			'status' =>'required'
                             );
                $validator = Validator::make($request->all(), $rules);
                if ($validator-> fails()){

                     return view('room_types.add', [
                                'messages' => $validator->messages()]);
                }
		$room_type = null;
		if($request->room_type_id > 0) { $room_type = Room_type::findOrFail($request->room_type_id); }
		else { 
			$room_type = new Room_type;
		}
	    

	    		
					    $room_type->room_type_id = $request->room_type_id;
		
	    		
					    $room_type->room_name = $request->room_name;
		
	    		
					    $room_type->status = $request->status;
		
	    		
					 //   $room_type->created_at = $request->created_at;
		
	    		
					  //  $room_type->updated_at = $request->updated_at;
		
	    	    //$room_type->user_id = $request->user()->id;
	    $room_type->save();

	    return redirect('/room_types');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$room_type = Room_type::findOrFail($id);

		$room_type->delete();
		return "OK";
	    
	}

	
}