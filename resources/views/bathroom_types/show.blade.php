@extends('layouts.main')

@section('content')



<h2 class="page-header">Bathroom_type</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Bathroom_type    </div>

    <div class="panel-body">
                

        <form action="{{ url('/bathroom_types') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="bathroom_type_id" class="col-sm-3 control-label">Bathroom Type Id</label>
            <div class="col-sm-6">
                <input type="text" name="bathroom_type_id" id="bathroom_type_id" class="form-control" value="{{$model['bathroom_type_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="bathroom_type_name" class="col-sm-3 control-label">Bathroom Type Name</label>
            <div class="col-sm-6">
                <input type="text" name="bathroom_type_name" id="bathroom_type_name" class="form-control" value="{{$model['bathroom_type_name'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="status" class="col-sm-3 control-label">Status</label>
            <div class="col-sm-6">
                <input type="text" name="status" id="status" class="form-control" value="{{$model['status'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
            <div class="col-sm-6">
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/bathroom_types') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection