<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Role;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $all_user = User::select(User::COL_NAME,User::COL_ID)->orderBy(User::COL_NAME)->get();
//        dd($all_user);
        return view('admin.create_user', compact('roles','all_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUser $request)
    {
        $user = new User([
           'name'=>$request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'address' => $request->get('address'),
            'birthday' => $request->get('birthday'),
            'role_id' => $request->get('role_id'),
            'is_active' => $request->get('is_active'),
            'manager_id' => $request->get('manager_id')
        ]);
        if ($request->hasFile('avatar')) {
            $img = $request->file('avatar')->getClientOriginalName();
            $request->avatar->move('images', $img);
            $user['avatar'] = $img;
            dd($img);
        }
        $user_check = User::where(User::COL_EMAIL, $user['email'])->first();
        if (!empty($user_check)) {
            return redirect('admin/user/create')->with("success", "Email này đã tồn tại", compact('user'))->withInput($request->input());
        } else {
            $user->save();
            return redirect('admin/home')->with('success', 'User saved!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $all_user = User::select(User::COL_NAME,User::COL_ID)->orderBy(User::COL_NAME)->get();
        $user->birthday = Date::make($user->birthday)->format('Y-m-d');
//        dd($user->birthday);
        $roles = Role::all();
        return view('admin.edit_user', compact('roles','user','all_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {

        $user = [];
        $user['name'] = $request->get('name');
        $user['email'] = $request->get('email');
        $user['password'] = Hash::make($request->get('password'));
        $user['address'] = $request->get('address');
        $user['birthday'] = $request->get('birthday');
        $user['role_id'] = $request->get('role_id');
        $user['is_active'] = $request->get('is_active');
        $user['manager_id'] = $request->get('manager_id');
//        if ($request->hasFile('avatar')) {
//            $img = time().'.'.$request->file('avatar')->getClientOriginalName();
//            $request->avatar->move('images', $img);
//            $user['avatar'] = $img;
////            dd($img);
//        }
        if($request->get('password') == ""){
            User::where('id', $id)->update($user);
        } else{

            User::where('id', $id)->update($user);

        }
            return redirect('/admin/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if($request->ajax()){
            $user = User::find($id);
            $user->delete();
            return "delete success";
        } else {
            return "delete failed";
        }
    }

    public function profile(){
        $id = Auth::id();
        $user = User::find($id);
        $user->birthday = Date::make($user->birthday)->format('Y-m-d');
        $roles = Role::all();
        $all_user = User::select(User::COL_NAME,User::COL_ID)->orderBy(User::COL_NAME)->get();
        return view('admin.profile',compact('user','roles','all_user'));
    }
}
