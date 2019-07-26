<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin\System;
class TimeSettingController extends Controller
{
    public function create(){
        $old_time = System::all()->first();
        return view('admin.time_create',compact('old_time'));
    }
    public function store(Request $request){

            System::truncate();
            $time = new System([
                'open_time_sheet' => $request->get('open-time'),
                'close_time_sheet' => $request->get('end-time')
            ]);

            $time->save();
            return redirect('admin/time/create')->with('success', 'User saved!');;


    }
}
