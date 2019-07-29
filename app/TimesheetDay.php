<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetDay extends Model
{
    const COL_ID = 'id';
    const COL_DAY_ID = 'day_id';
    const COL_TROUBLE = 'trouble';
    const COL_NEXT_DAY_PLAN = 'next_day_plan';
    protected $fillable = [
        'day', 'trouble', 'next_day_plan',
    ];
}
