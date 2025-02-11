<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginrRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /*
    create user
    */
    public function register(RegisterRequest $request)
    {
        // create user, hash password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // login
        Auth::login($user);

        // redirect admin page
        return redirect()->route('admin');
    }

    /*
    login
    */
    public function login(LoginRequest $request)
    {
        // validation (required email, pass)
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // auth
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // セッション固定攻撃対策
            return redirect()->intended('/admin'); // redirect admin page
        }

        // login failed
        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。'
        ]);
    }

    /*
    logout
    */
    public function logout(Request $request)
    {
        Auth::logout(); // logout
        $request->session()->invalidate(); // delete session
        $request->session()->regenerateToken(); // regenerate csrf token
        return redirect('/login'); // redirect login page
    }
}
