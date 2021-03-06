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
        <form class="" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="alert">
                <p style="color:red;">
                    {{Session('success')}}
                </p>
            </div>
            <div class="col-sm-3">
            </div>
            <div class="box-body col-sm-9">
                @csrf
                <div class="form-group col-sm-8">
                    <label for="first_name">Name:</label>
                    <input placeholder="Name" type="text" class="form-control" name="name" value="{{old('name')}}"/>
                    {{$errors}}
                    @foreach ($errors->get('name') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>

                <div class="form-group col-sm-8">
                    <label for="email">Email:</label>
                    <input placeholder="email" type="text" class="form-control" name="email"/>
                    @foreach ($errors->get('email') as $message)

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
                    <input placeholder="Address" type="text" class="form-control" name="address" value="{{old('address')}}"/>
                    @foreach ($errors->get('address') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>
                <div class="form-group col-sm-8">
                    <label>Birthday:</label>

                    <div class="md-form">
                        <input placeholder="Selected date" type="date" class="form-control" name="birthday" value="{{old('birthday')}}">
                        @foreach ($errors->get('birthday') as $message)

                            <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                        @endforeach
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group col-sm-8">
                    <div class="col-md-6 avatar-label">
                        <label for="job_title">Avatar:</label>
                        <div class="box-body pad">
                        <input type="file" required id="image"
                        class="form-control file_val image-create" name="avatar"

                        onchange="readURL(this);">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <img id="image-url" src="/images/img_avatar3.png" alt=""
                             width="100%" height="230px">
                    </div>
                </div>
                <div class="form-group col-sm-8">
                    <label for="job_title">Role:</label>
                    <select class="form-control" name="role_id" value="{{old('role_id')}}">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('role_id') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>

                <div class="form-group col-sm-8" >
                    <label for="job_title">Manager:</label>
                    <select  class="form-control" name="manager_id" value="{{old('manager_id')}}">
                        <option value="" >--</option>

                        @foreach($all_user as $manager)
                            <option value="{{$manager->id}}" >{{$manager->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-8" >
                    <label for="job_title">Active:</label>
                    <select class="form-control"  name="is_active" value="{{old('is_active')}}">
                        <option value="0">Not active</option>
                        <option value="1">Active</option>
                    </select>
                    @foreach ($errors->get('is_active') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>
                <div class="form-group col-sm-8" style="text-align: center">
                    <button type="submit" class="btn btn-primary-outline">Create User</button>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')

@stop