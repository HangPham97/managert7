<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    public function Task(){
        return $this->hasMany('App\Task');
    }
}
