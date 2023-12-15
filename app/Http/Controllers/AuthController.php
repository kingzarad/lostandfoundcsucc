<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if(auth()->check()){
            return redirect()->route('admin');
        }
        return response()->view('admin.login.index')->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }

    public function authenticate()
    {

        $validated = request()->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:5|max:50'
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('admin')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->with('error', 'No matching user found with the provided email and password' );
    }

    public function store()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);
        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }
}
