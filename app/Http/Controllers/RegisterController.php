<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function form ()
    {
        return view('admin.user.register');
    }

    public function submit (Request $request) {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'address' => $request->address
        ]);
        return redirect('/')->with('status', 'Your account has been created. Please login to continue.');
        // dd($request);
    }
}
