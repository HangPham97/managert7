<?php

namespace App\Http\Controllers;

use App\TimesheetDay;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function create(){
        return view('create_timesheet');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'date' => 'required|max:255',
            'task-id' => 'required',
            'task-info' => 'required|string',
            'used-time' => 'required|number',
//            'trouble'
            'next-plan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $time_sheet = new TimesheetDay([
                'date'=> $request->get('date'),
                'trouble' => $request->get('trouble'),
                'next_plan' => $request->get('next-plan')
            ]);


        }

    }
}
