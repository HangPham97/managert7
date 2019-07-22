<?php

namespace App\Http\Controllers;

use App\Admin\Role;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
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
        return view('auth.create_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUser $request)
    {
        $validator = $request->validated();
        $user = new User([
           'name'=>$request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'address' => $request->get('address'),
            'birthday' => $request->get('birthday'),
            'role_id' => $request->get('role_id'),
            'is_active' => $request->get('is_active')
        ]);
        $user_check = User::where('email', $user['email'])->first();
        if (!empty($user_check)) {
            return redirect('/user/create')->with("success", "Email này đã tồn tại", compact('user'))->withInput($request->input());
        } else {
            $user->save();
            return redirect('/home')->with('success', 'User saved!');
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
        $roles = Role::all();
        return view('auth.edit_user', compact('roles','user'));
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

//        $request->validated();
//        dd($validator);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        } else {
            if($request->get('password') == ""){
                User::where('id', $id)->update($request->except(['_token','_method','password','password_confirmation']));
            } else{

                User::where('id', $id)->update($request->except(['_token','_method','password_confirmation']));
            }
            return redirect('/home');
//        }

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
}
