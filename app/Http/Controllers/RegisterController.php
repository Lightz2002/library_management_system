<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.login.register', [
            'title' => 'Register',
            'path' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users|email:dns',
            'name' => 'required|max:255',
            'password' => 'required| min:3 | max:5',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);
        // $request->session()->flash('success', 'Account Registered Successfully!');
        return redirect('/login')->with('success', 'Account Registered Successfully !');
    }
}
