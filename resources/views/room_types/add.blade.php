@extends('layouts.main')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        (Add/Modify) Room Type    </div>

    <div class="panel-body">
        
        	@if (isset($messages))
	 <div class="alert alert-danger">
        <ul>
            @foreach ($messages->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
	   
                
        <form action="{{ url('/room_types'.( isset($model) ? "/" . $model->room_type_id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


<!--                                                            <div class="form-group">
                <label for="room_type_id" class="col-sm-3 control-label">Room Type Id</label>
                <div class="col-sm-2">
                    <input type="number" name="room_type_id" id="room_type_id" class="form-control" value="{{$model['room_type_id'] or ''}}">
                </div>
            </div>-->
            <input type="hidden" name="room_type_id" id="room_type_id" class="form-control" value="{{$model['room_type_id'] or ''}}">
                                                                                    <div class="form-group">
                <label for="room_name" class="col-sm-3 control-label">Room Name</label>
                <div class="col-sm-6">
                    <input type="text" name="room_name" id="room_name" class="form-control" value="{{$model['room_name'] or ''}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-2">
				
                 
                  <select name="status" id="status" class="form-control" value="{{$model['status'] or ''}}">
				   <option value="" >Select Property Status</option>
				 
                    <option value="1"{{(isset($model['status']) && $model['status'] == '1') ? ' selected="selected"' : ''}} >Active</option>
                    <option value="0" {{(isset($model['status']) && $model['status'] == '0') ? ' selected="selected"' : ''}} >Deactive</option>
				 
                  </select>
                 
                    <!--<input type="number" name="status" id="status" class="form-control" value="{{$model['status'] or ''}}">-->
                </div>
            </div>
            
<!--            <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-6">
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
                <div class="col-sm-6">
                    <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}">
                </div>
            </div>-->
                        
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/room_types') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection