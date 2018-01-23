<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use ValidatesRequests;
use App\Room_amenity;
use Validator;
use Response;
use DB;

class Room_amenitiesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('room_amenities.index', []);
	}

	public function create(Request $request)
	{
	    return view('room_amenities.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$room_amenity = Room_amenity::findOrFail($id);
	    return view('room_amenities.add', [
	        'model' => $room_amenity	    ]);
	}

	public function show(Request $request, $id)
	{
		$room_amenity = Room_amenity::findOrFail($id);
	    return view('room_amenities.show', [
	        'model' => $room_amenity	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM room_amenities a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE amenity_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.amenity_id) c".$presql);
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
                        'amenity_name' => 'required|max:255',
			'status' =>'required'
                             );
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator-> fails()){

                         return view('room_amenities.add', [
                                    'messages' => $validator->messages()]);
                    }
		$room_amenity = null;
		if($request->amenity_id > 0) { $room_amenity = Room_amenity::findOrFail($request->amenity_id); }
		else { 
			$room_amenity = new Room_amenity;
		}
	    

	    		
					    $room_amenity->amenity_id = $request->amenity_id;
		
	    		
					    $room_amenity->amenity_name = $request->amenity_name;
		
	    		
					    $room_amenity->status = $request->status;
		
	    		
					//    $room_amenity->created_at = $request->created_at;
		
	    		
					//    $room_amenity->updated_at = $request->updated_at;
		
	    	    //$room_amenity->user_id = $request->user()->id;
	    $room_amenity->save();

	    return redirect('/room_amenities');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$room_amenity = Room_amenity::findOrFail($id);

		$room_amenity->delete();
		return "OK";
	    
	}

	
}