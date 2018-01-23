@extends('master')

@section('content')


<h2 class="page-header">Property_type</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Property_type    </div>

    <div class="panel-body">
                
        <form action="{{ url('/dashboard'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                                            <div class="form-group">
                <label for="property_type_id" class="col-sm-3 control-label">Property Type Id</label>
                <div class="col-sm-2">
                    <input type="number" name="property_type_id" id="property_type_id" class="form-control" value="{{$model['property_type_id'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="property_type_name" class="col-sm-3 control-label">Property Type Name</label>
                <div class="col-sm-6">
                    <input type="text" name="property_type_name" id="property_type_name" class="form-control" value="{{$model['property_type_name'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-2">
                    <input type="number" name="status" id="status" class="form-control" value="{{$model['status'] or ''}}">
                </div>
            </div>
                                                                                                                        <div class="form-group">
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
            </div>
                        
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/dashboard') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection