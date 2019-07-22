@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->

        <form class="" action="{{route('user.update',$user->id)}}" method="POST">
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-3">
            </div>
            <div class="box-body col-sm-9">
                <div class="form-group col-sm-8">

                    {{--@if(sizeof($errors) > 0)--}}
                    {{--@endif--}}
                    <label for="first_name">Name:</label>
                    <input placeholder="Name" type="text" class="form-control" name="name" value="{{old('name', $user->name)}}"/>

                    @foreach ($errors->get('name') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>

                <div class="form-group col-sm-8">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
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
                    <input placeholder="Address" type="text" class="form-control" name="address" value="{{old('address', $user->address)}}"/>
                    @foreach ($errors->get('address') as $message)

                        <div class="alert alert-danger" style="margin: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>
                <div class="form-group col-sm-8">
                    <label>Birthday:</label>

                    <div class="md-form">
                        <input placeholder="Selected date" type="date" class="form-control datepicker" name="birthday" value="{{old('birthday',date('m-d-Y'))}}">
                        @foreach ($errors->get('birthday') as $message)

                            <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                        @endforeach
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group col-sm-8">
                    <label for="job_title">Avatar:</label>
                    <input placeholder="Image file" type="text" class="form-control" name="avatar" value="{{old('avatar', $user->avatar)}}"/>
                </div>
                <div class="form-group col-sm-8">
                    <label for="job_title">Role:</label>
                    <select name="role_id" class="form-control" value="{{old('role_id', $user->birthday)}}">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('role_id') as $message)

                        <div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>

                    @endforeach
                </div>
                <div class="form-group col-sm-8">
                    <label for="job_title">Active:</label>
                    <select class="form-control"  name="is_active" value="{{old('is_active', $user->is_active)}}">
                        <option value="0">Not active</option>
                        <option value="1">Active</option>
                    </select>
            </div>
                <div class="form-group col-sm-8" style="text-align: center">
                    <button type="submit" class="btn btn-primary-outline">Edit contact</button>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')

@stop