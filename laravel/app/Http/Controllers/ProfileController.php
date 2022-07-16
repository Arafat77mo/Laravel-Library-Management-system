<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // $users = Auth::user();
        $users = user::where('id',Auth::id())->get();
        // $users = user::all();
        // return $users;
        return view('user.index',compact('users'));
    }
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        session()->flash('success', 'profile user updated Successfully !');
        return redirect()->route('getprofile');
    }
}
