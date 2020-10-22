<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function handleSignup(Request $request)
    {
        $user = new \App\Models\User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type');
        $user->save();
        return redirect('signup');
    }

    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            // redirect
        };
        return view('login');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if (Auth::user()->profilepic) {
                Storage::delete('/public/images/' . Auth::user()->profilepic);
            }
            $request->image->storeAs('images', $filename, 'public');
            // auth()->user()->update(['profilepic' => 'test']);
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['profilepic' => $filename]);
        }
        return redirect()->back();
    }
}
