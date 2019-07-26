<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    const COL_ID = 'id';
    const COL_OPEN_TIME_SHEET = 'open_time_sheet';
    const COL_CLOSE_TIME_SHEET = 'close_time_sheet';
    protected $fillable = [
        'open_time_sheet', 'close_time_sheet',
    ];
}
