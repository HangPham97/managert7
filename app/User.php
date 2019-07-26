<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const COL_ID = 'id';
    const COL_EMAIL = 'email';
    const COL_PASSWORD = 'password';
    const COL_NAME = "name";
    const COL_ROLE_ID = 'role_id';
    const COL_AVATAR = 'avatar';
    const COL_ADDRESS = 'address';
    const COL_BIRTH_DAY = 'birthday';
    const COL_IS_ACTIVE = 'is_active';
    const COL_MANAGER_ID = 'manager_id';
    protected $fillable = [
        'name', 'email', 'password','role_id','avartar','address','birthday','is_active','manager_id'
    ];
    public function role()
    {
        return $this->belongsTo('App\Admin\Role','role_id');
    }

}
