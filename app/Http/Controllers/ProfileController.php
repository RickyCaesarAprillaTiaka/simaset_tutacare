<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth, Session, Redirect, Hash;
use App\Http\Requests\ProfileRequest;
use Mytuta;

class ProfileController extends Controller
{
    public function index()
    {
      $profile = User::find(Auth::user()->id);
      return view('dashboard.profile.index', compact('profile'));
    }

    public function update(ProfileRequest $request, $id)
    {
      $profile = User::find($id);

      $data = $request->except(['password', 'foto']);
      if($request->has('password'))
      {
        $data = array_merge($data, ['password' => Hash::make($request->password)]);
      }
      if($request->hasFile('foto'))
      {
        $upload = Mytuta::uploadImageEdit($request->file('foto'), 'user', $profile->foto, 256, null);
        $data = array_merge($data, ['foto' => $upload]);
      }

      $profile->update($data);
      Session::flash('message', 'Profile telah di update!');
      return Redirect::to('dashboard/profile');
    }
}
