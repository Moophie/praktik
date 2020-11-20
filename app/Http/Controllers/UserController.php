<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Goutte;

class UserController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function handleSignup(Request $request)
    {
        $user = new \App\Models\User();

        // check if email is unique
        $email = $user::where('email', $request->input('email'))->first();
        if ($email) {
            $request->session()->flash('error', 'Email is already in use');
            return view('signup');
        }

        // check if both password are the same
        if ($request->input('password') != $request->input('confirmPassword')) {
            $request->session()->flash('error', 'Passwords are not the same');
            return view('signup');
        }

        // Set object properties from the user input
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        // Hash the password with BCRYPT
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type');

        $user->save();

        return redirect('login');
    }

    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        // Get the user's email and password and put them in an array
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        };

        $request->session()->flash('error', 'Something went wrong');
        return view('login');
    }

    public function uploadSettings(Request $request)
    {
        // upload profile picture
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if (Auth::user()->profilepic) {
                Storage::delete('/public/images/' . Auth::user()->profilepic);
            }
            $request->image->storeAs('images', $filename, 'public');
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['profilepic' => $filename]);
        }
        // upload cv file
        if ($request->hasFile('cv')) {
            $filename = $request->cv->getClientOriginalName();
            if (Auth::user()->cv) {
                Storage::delete('/public/files/' . Auth::user()->cv);
            }
            $request->cv->storeAs('files', $filename, 'public');
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['cv' => $filename]);
        }

        return redirect()->back();
    }

    public function getDribbbleShots(Request $request)
    {
        $url = $request->input('url');
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['dribbble_url' => $url]);
        $crawler = Goutte::request('GET', $url);
        $shots = $crawler->filter('.shot-thumbnail')->count();
        if ($shots > 0) {
            for ($i = 0; $i < $shots; $i++) {
                $images[] = $crawler->filter('figure > img')->eq($i)->attr("src");
            };
            $images = implode(',', $images);
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['portfolio' => $images]);
        }
        return redirect()->back();
    }
}
