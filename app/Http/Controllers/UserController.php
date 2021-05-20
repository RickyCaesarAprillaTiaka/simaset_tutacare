<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Redirect, Session, Mytuta;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        if($request->hasFile('foto'))
        {
          $upload = Mytuta::uploadImage($request->file('foto'), 'user', 256, null);
          $user->foto = $upload;
        }
        $user->save();
        Session::flash('message', 'Menambah Pengguna sukses!');
        return Redirect::to('dashboard/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::find($id);
      return view('dashboard.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
      $user = User::find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role = $request->role;
      if($request->has('password'))
      {
        $user->password = bcrypt($request->password);
      }
      $user->role = $request->role;
      if($request->hasFile('foto'))
      {
        $upload = Mytuta::uploadImageEdit($request->file('foto'), 'user', $user->foto, 256, null);
        $user->foto = $upload;
      }
      $user->save();
      Session::flash('message', 'Mengganti Pengguna sukses!');
      return Redirect::to('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $users = User::find($id);
      $users->delete();
      Session::flash('message', 'Menghapus Pengguna Sukses!');
      return Redirect::to('dashboard/users');
    }

    public function getData(Request $request)
    {
      $user = User::find($request->id);
      return view('dashboard.users.show', ['user' => $user]);
    }
}
