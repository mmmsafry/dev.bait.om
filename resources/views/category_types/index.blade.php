@extends('layouts.main')

@section('content')



<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('Category types') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('category_types/create')}}" class="btn btn-primary" role="button">Add category type</a>
    </div>
</div>




    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('category_types/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/category_types') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
					{
                        "render": function ( data, type, row ) {
							
							if (data == 1) {
									status = "Active";
								}else{
									status = "Deactive";
								};
                            return status;
                        },
                        "targets": 2
                    },
					
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/category_types') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 5                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 5+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/category_types') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection