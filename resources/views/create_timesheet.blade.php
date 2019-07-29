@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('content')
    <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->

        <form class="" action="{{route('timesheet.store')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-3">

            </div>
            <div class="box-body col-sm-9">
                <div class="form-group col-sm-8">

                    {{--@if(sizeof($errors) > 0)--}}
                    {{--@endif--}}
                    <label for="first_name">Date:</label>
                    <input type="date" type="text" class="form-control" name="date" value=""/>
                    {{--@foreach ($errors->get('open-time') as $message)--}}
                    {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>

                <div class="form-group col-sm-8 task-line">
                    <button id="add-btn" type="button" class="btn btn-primary"
                            style="float: left; margin-bottom: 10px;">Add task
                    </button>
                    <table class="task-table">
                        <tr>
                            <th style="width: 5%">Stt</th>
                            <th style="width: 15%">Task ID</th>
                            <th style="width: 35%">Task Infomation</th>
                            <th style="width: 25%">Used Time</th>
                            <th style="width: 14%">Delete</th>
                        </tr>
                        <tr class="first-child" id="1">
                            <td style="padding-left:15px">1</td>
                            <td><input placeholder="" type="text" class="form-control task-input" name="task-id"
                                       value=""/></td>
                            <td><input placeholder="" type="text" class="form-control task-input" name="task-info"
                                       value=""/></td>
                            <td><input placeholder="hours" type="number" class="form-control task-input" name="used-time"
                                       value=""/></td>
                            <td><a class="btn btn-danger btn-xs delete-task" onclick="deleteDiv(this)" data-id="1"><span
                                            class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    </table>
                    {{--@foreach ($errors->get('mail') as $message)--}}
                    {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>
                <div class="form-group col-sm-8">

                    <label for="trouble">Trouble:</label>
                    <input placeholder="" type="text" class="form-control" name="trouble"
                           value=""/>
                    {{--@foreach ($errors->get('mail') as $message)--}}
                    {{--<div class="alert alert-danger" style="margin-top: 5px; height: 25px; line-height: 15px; padding-top: 5px;">{{$message }}</div>--}}
                    {{--@endforeach--}}
                </div>
                <div class="form-group col-sm-8">

                    <label for="next-plan">Next day plan:</label>
                    <input placeholder="" type="text" class="form-control" name="next-plan"
                           value=""/>
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
    <script>
        $(function () {
            var count = 1;
            $('#add-btn').click(function () {
                count++;
                var div = '<tr data-id=' + count + '> <td style="padding-left:15px">' + count +
                    '</td> <td><input  placeholder="" type="text" class="form-control task-input" name="task-id"'+
                    ' value="" /></td> <td><input  placeholder="" type="text" class="form-control task-input" name'+
                    '="task-info" value="" /></td> <td><input  placeholder="hours" type="number" class="form-control'+
                    ' task-input" name="used-time" value="" /></td> <td><a class="btn btn-danger btn-xs delete-task"'+
                    ' onclick="deleteDiv(this)" value=0 data-id=' + count + ' ><span class="glyphicon glyphicon-trash'+
                    '"></span></a></td> </tr>'
                $(".task-table tbody").append(div)
            });
        })

        function deleteDiv(elem) {
//            alert($(elem).attr("data-id"));
            $(elem).parent().parent().remove();
        }
    </script>
@stop