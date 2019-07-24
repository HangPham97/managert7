<?php

namespace App\Http\Controllers\Admin;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class DatatablesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('welcome');
    }
    public function anyData()
    {
        $users = User::select(['id', 'name', 'email', 'role_id']);
        return Datatables::of($users)
            ->addColumn('role_name',function (User $user){
                 return $user->role->role_name;
            })
            ->make(true);
    }
}
