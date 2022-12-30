<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register 
    public function create()
    {
        return view('users.register');
    }
    //  Sore User 
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:5',
        ]);

        //   Hash Password 
        $formFields['password'] = bcrypt($formFields['password']);

        //    Create User 
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');
    }
    //  logout users 
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    //    login user
    public function login()
    {
        return view('users.login');
    }
    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now login!');
        }
        return back()->withErrors(['email' => 'Invalide Credentials'])->onlyInput('email');
    }
}
