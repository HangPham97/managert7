@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->

        <form class="" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-3">
            </div>
            <div class="box-body col-sm-9">
                <div class="form-group col-sm-8">

                    {{--@if(sizeof($errors) > 0)--}}
                    {{--@endif--}}
                    <label for="first_name">Name:</label>
                    <input placeholder="Name" type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" readonly/>
                </div>

                <div class="form-group col-sm-8">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}" />
                    @foreach ($errors->get('mail') as $message)
                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>
                    @endforeach
                </div>
                <div class="form-group col-sm-8">
                    <label for="country">Password:</label>
                    <input type="password" class="form-control" name="password"/>
                    @foreach ($errors->get('password') as $message)
                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>
                    @endforeach
                </div>

                <div class="form-group col-sm-8">
                    <label for="country">Confirm Password:</label>
                    <input type="password" class="form-control" name="password_confirmation"/>
                </div>

                <div class="form-group col-sm-8">
                    <label for="city">Address:</label>
                    <input readonly placeholder="Address" type="text" class="form-control" name="address" value="{{old('address', $user->address)}}"/>
                </div>
                <div class="form-group col-sm-8">
                    <label>Birthday:</label>
                        <input readonly placeholder="Selected date" type="date" class="form-control" name="birthday" value="{{$user->birthday}}" >
                    </div>
                <div class="form-group col-sm-8">
                    <div class="col-md-6 avatar-label">
                        <label for="job_title">Avatar:</label>

                    </div>
                    <div class="col-md-6">
                        <img id="image-url" src="/images/{{$user->avatar}}" alt=""
                             width="100%" height="230px">
                    </div>
                </div>
                <div class="form-group col-sm-8">
                    <label for="job_title">Role:</label>
                    <select name="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" <?php echo $user->role_id == 1 ? "selected" : "" ?>>{{$role->role_name}} </option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('role_id') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>
                <div class="form-group col-sm-8" >
                    <label for="job_title">Manager:</label>
                    {{$user->manager_id}}
                    <select  class="form-control" name="manager_id">
                        <option value="">--</option>
                        @foreach($all_user as $manager)
                        <option value="{{$manager->id}}" <?php echo $user->manager_id == $manager->id ? "selected" : "" ?> >{{$manager->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-8">
                    <label for="job_title">Active:</label>
                    <select class="form-control"  name="is_active" value="{{old('is_active', $user->is_active)}}">
                        <option value="0" <?php echo $user->is_active == 1 ? "selected" : "" ?>>Not active</option>
                        <option value="1" <?php echo $user->is_active == 1 ? "selected" : "" ?>>Active</option>
                    </select>
            </div>
                <div class="form-group col-sm-8" style="text-align: center">
                    <button type="submit" class="btn btn-primary-outline">Edit user</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('image-url').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop