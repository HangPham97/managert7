<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    const COL_ID = 'id';
    const COL_USER_ID = 'user_id';
    const COL_REGIST = 'regist';
    const COL_LATE_REGIST = 'late_regist';
    protected $fillable = [
        'user_id', 'regist', 'late_regist',
    ];
}
