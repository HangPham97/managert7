@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@stop
@section('content_header')
    <div class="col-md-3"><h1 style="margin-top: 0">Dashboard</h1></div>
    <div class="col-md-9">
        <button onclick="location.href='user/create'" type="button" class="btn btn-primary" style="float: right;">New</button>
    </div>

@stop

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
@stop


@section('js')

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('datatables.data') }}"
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role_name', name: 'role'},
                    {
                        data: 'id',
                        name: 'action',
                        render: function (data) {
                            var command = "";
                            command += '<a href="user/'+data+'/edit" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a> ' +
                                    '<meta name="csrf-token" content="{{ csrf_token() }}">' +
                                '<a href="user/'+data+'" class="btn btn-danger btn-xs delete"><span class="glyphicon glyphicon-trash"></span></a>'
                            return command;
                        }
                    }
                ]

            });
        });
        $(document).on('click', '.delete', function(){
            var parentPost = $(this).closest('.post');

            if(confirm("Are you sure you want to Delete this data?")) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'delete',
                    url: $(this).attr('href'),
                    success: function (data) {
                        if (data == "delete success") {
                            alert(data);
                            location.reload();
//                            parentPost.slideUp();
                        } else {
                            alert("Could not delete data");
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
            else
            {
                return false;
            }
        });
    </script>
@stop