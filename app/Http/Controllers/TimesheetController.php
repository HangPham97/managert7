<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function create(){
        return view('create_timesheet');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }

    }
}
