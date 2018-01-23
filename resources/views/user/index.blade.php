@extends('layouts.main')

@section('title', 'Users')

@section('content')
    
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> {{ $result->total() }} {{ str_plural('User', $result->count()) }} </h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <div class="col-md-5 page-action text-right">
                            @can('add_users')
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
   
    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                @can('edit_users', 'delete_users')
                <th>Status</th>
                <th class="text-center">Actions</th>
                @endcan
            </tr>
             <tr>
                    <form id="validate" method="post" action="">
                        <td><input type="text" id="name_id" name="name_search" class="form-control pull-right" placeholder="Search"></td>
                        <td><input type="text" id="email_id" name="email_search" class="form-control pull-right" placeholder="Search"></td>
                        <td><input type="text" id="company_id" name="company_search" class="form-control pull-right" placeholder="Search"></td>
                        <td> <div class="form-group">

                                <select class="form-control" id="status">
                                    <option value="0">Select Status</option>
                                    <option value="Yes">Active</option>
                                    <option value="No">Inactive</option>

                                </select>
                            </div></td>

                    </form>
                </tr>

            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    @can('edit_users')
                     <td>
                        <?php
                                if($item->status==1){

                                    ?>

                                    <div class="form-group">
                                        <div class="btn-group">
                                            <label class="btn btn-success card_yes<?php echo $item->id ?>" ><input style="display: none;" onclick="checkStatus(<?php echo $item->id ?>)" type="radio" id="checked<?php echo $item->id ?>" checked value="1" name="activation_type">Active</label>
                                            <label class="btn btn-default card_no<?php echo $item->id ?>" ><input style="display: none;" onclick="checkStatus(<?php echo $item->id ?>)" type="radio" checked<?php echo $item->id ?>  value="0" name="activation_type"> Inactive </label>
                                        </div>

                                    </div>
                                    <?php }else{ ?>
                                    <div class="form-group">
                                        <div class="btn-group">
                                            <label class="btn btn-default card_yes<?php echo $item->id ?>" ><input style="display: none;" onclick="checkStatus(<?php echo $item->id ?>)" type="radio"  value="1" name="activation_type">Active</label>
                                            <label class="btn btn-success card_no<?php echo $item->id ?>" ><input style="display: none;" onclick="checkStatus(<?php echo $item->id ?>)" type="radio" id="checked<?php echo $item->id ?>" checked value="0" name="activation_type"> Inactive </label>
                                        </div>

                                    </div>

                            <?php }?>
                    </td>
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>
 </div>
    </div>
    </div>
<script>
 
        function checkStatus(id) {
            
             if($('#checked'+id).is(':checked')) { alert("It's already selected"); 
             return false;
             }

            var activation_type = $("input[name='activation_type']:checked").val();
                var Url = '{{ url('users/changeStatus') }}';
                var type = activation_type;
                var dataString ={'type':type,'id':id};
            if (activation_type == "1") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:Url,
                    type:"POST",
                    data:dataString,
                    dataType: "json",
                    success: function(data) {

                       alert(data);
                      location.reload();
                    }
                });

                $(".card_yes"+id).removeClass("btn-default").addClass("btn-success");
                $(".card_no"+id).removeClass("btn-success").addClass("btn-default");

            } else {
                
                 $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:Url,
                    type:"POST",
                    data:dataString,
                    dataType: "json",
                    success: function(data) {

                       alert(data);
                       location.reload();
                    }
                });

               
                $(".card_yes"+id).removeClass("btn-success").addClass("btn-default");
                $(".card_no"+id).removeClass("btn-default").addClass("btn-success");
            }
        }

    </script>
@endsection