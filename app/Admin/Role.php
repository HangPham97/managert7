<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'id';
//    protected function user(){
//        return $this->hasOne('App/User','id');
//    }
}
