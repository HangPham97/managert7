<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const COL_ID = 'id';
    const COL_ROLE_NAME = 'role_name';
    protected $primaryKey = 'id';
//    protected function user(){
//        return $this->hasOne('App/User','id');
//    }
}
