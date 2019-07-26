@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="box box-info">

        <div class="">
            <p style="color:red; padding: 5px;">
                {{Session('success')}}
            </p>
        </div>

        <form class="" action="{{route('time.store')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-3">

            </div>
            <div class="box-body col-sm-9">
                <div class="form-group col-sm-8">

                    {{--@if(sizeof($errors) > 0)--}}
                    {{--@endif--}}
                    <label for="first_name">Open Time:</label>
                    <input required type="time" placeholder="ex: 01:12 AM" type="text" class="form-control" name="open-time" value="{{$old_time->open_time_sheet}}" />
                </div>

                <div class="form-group col-sm-8">
                    <label for="email">End Time:</label>
                    <input required type="time" placeholder="ex: 01:12 AM" type="text" class="form-control" name="end-time" value="{{$old_time->close_time_sheet}}" />
                <div class="form-group col-sm-8" style="text-align: center">
                    <button type="submit" class="btn btn-primary-outline">Done</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
@stop