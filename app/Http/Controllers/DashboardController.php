<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Property_type;

use DB;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('dashboard.index', []);
	}

	public function create(Request $request)
	{
	    return view('dashboard.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$property_type = Property_type::findOrFail($id);
	    return view('dashboard.add', [
	        'model' => $property_type	    ]);
	}

	public function show(Request $request, $id)
	{
		$property_type = Property_type::findOrFail($id);
	    return view('dashboard.show', [
	        'model' => $property_type	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM property_types a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE property_type_name LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.id) c".$presql);
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
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
		$property_type = null;
		if($request->id > 0) { $property_type = Property_type::findOrFail($request->id); }
		else { 
			$property_type = new Property_type;
		}
	    

	    		
					    $property_type->property_type_id = $request->property_type_id;
		
	    		
					    $property_type->property_type_name = $request->property_type_name;
		
	    		
					    $property_type->status = $request->status;
		
	    		
					    $property_type->created_at = $request->created_at;
		
	    		
					    $property_type->updated_at = $request->updated_at;
		
	    	    //$property_type->user_id = $request->user()->id;
	    $property_type->save();

	    return redirect('/dashboard');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$property_type = Property_type::findOrFail($id);

		$property_type->delete();
		return "OK";
	    
	}

	
}