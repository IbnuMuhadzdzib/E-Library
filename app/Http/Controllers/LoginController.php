<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'role' => 'required',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
       $credentials = $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required|min:8'
       ]);

       if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        $role = $user->role;

        switch($role) {
            case 'admin':
                return redirect()->intended('/dashboard');
            case 'user':
                return redirect()->intended('/');
            default:
                Auth::logout();
                return redirect()->route('login')->with('error', 'Unauthorized access.');
        }
        
       }

       return back()->with('error','Login Failed!');

    }
}
