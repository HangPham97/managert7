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

        <form class="" action="{{route('time.store')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-3">

            </div>
            <div class="box-body col-sm-9">
                <div class="form-group col-sm-8">

                    {{--@if(sizeof($errors) > 0)--}}
                    {{--@endif--}}
                    <label for="first_name">DAY:</label>
                    <input type="date"  type="text" class="form-control" name="open-time" value="" />
                    {{--@foreach ($errors->get('open-time') as $message)--}}
                        {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>

                <div class="form-group col-sm-8">
                    <label for="email">Task ID:</label>
                    <input  type="text" class="form-control" name="task-id" value="" />
                    {{--@foreach ($errors->get('mail') as $message)--}}
                    {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>
                <div class="form-group col-sm-8">
                    <label for="email">Task Info:</label>
                    <input type="text" type="text" class="form-control" name="end-time" value="" />
                    {{--@foreach ($errors->get('mail') as $message)--}}
                        {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>
                <div class="form-group col-sm-8">
                    <label for="email">Used Time:</label>
                    <input  placeholder="hours" type="text" class="form-control" name="end-time" value="{{old('end-time')}}" />
                    {{--@foreach ($errors->get('mail') as $message)--}}
                        {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>
                <div class="form-group col-sm-8" style="text-align: center">
                    <button type="submit" class="btn btn-primary-outline">Done</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
@stop