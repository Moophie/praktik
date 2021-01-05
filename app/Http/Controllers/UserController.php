<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Goutte\Client;

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
        $user->profilepic = "placeholder_pp.png";
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

    public function handleLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        // Put all companies from the database in an array
        $data['users'] = \Illuminate\Support\Facades\DB::table('users')->get();

        return view('users/index', $data);
    }

    public function profile()
    {
        return view('users/profile');
    }
    
    public function show($user)
    {
        // Get the specific company with the given id and put it in an array
        $data['user'] = \App\Models\User::where('id', $user)->first();

        return view('users/show', $data);
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
            \App\Models\User::where('id', Auth::user()->id)
                ->update(['profilepic' => $filename]);
        }
        // upload cv file
        if ($request->hasFile('cv')) {
            $filename = $request->cv->getClientOriginalName();
            if (Auth::user()->cv) {
                Storage::delete('/public/files/' . Auth::user()->cv);
            }
            $request->cv->storeAs('files', $filename, 'public');
            \App\Models\User::where('id', Auth::user()->id)
                ->update(['cv' => $filename]);
        }

        return redirect('/profile');
    }

    public function getDribbbleShots(Request $request)
    {
        $url = $request->input('url');
        \App\Models\User::where('id', Auth::user()->id)
            ->update(['dribbble_url' => $url]);
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $shots = $crawler->filter('.shot-thumbnail')->count();
        if ($shots > 0) {
            if ($shots > 4) { // if there are more than 4 pics
                for ($i = 0; $i < 4; $i++) { // take 4 most recent pics
                    $images[] = $crawler->filter('figure > img')->eq($i)->attr("src");
                };
            } else { // if less than 4 pics
                for ($i = 0; $i < $shots; $i++) { // take all pics
                    $images[] = $crawler->filter('figure > img')->eq($i)->attr("src");
                };
            }
            $images = implode(',', $images); // convert array to string
            \App\Models\User::where('id', Auth::user()->id)
                ->update(['portfolio' => $images]);
        }

        return redirect('/users/index');
    }
}
