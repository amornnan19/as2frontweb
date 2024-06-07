<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended($this->redirectPath());
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
