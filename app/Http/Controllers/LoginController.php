<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class LoginController extends Controller
{
    public function getLogin ()
    {
        return view('admin.user.login');
    }

    public function postLogin (Request $request)
    {
        // validate the login form
        $validation = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validation) {
            // Login attempt
            if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended('/admin');
            } elseif (auth('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended('/');
            }
            else{
                return back()->with('alert', 'Login Error');
            }
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            auth('admin')->logout();
        } elseif (Auth::guard('user')->check()) {
            auth('user')->logout();
        }
        return redirect('/');
    }
}
