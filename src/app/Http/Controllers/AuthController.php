<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show register form.
    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Handles user registration.
     *
     * - Receives validated request data to create a new user.
     * - Hashes the password before saving the user to the database.
     * - Login the newly registered user and redirects to the admin page.
     *
     * @param   \App\Http\Requests\RegisterRequest　　$request　　The validated registration request.
     * @return  \Illuminate\Http\RedirectResponse           　　Redirects to the admin dashboard upon successful registration.
     */
    public function register(RegisterRequest $request)
    {
        // Create user and hash the password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the login page
        return redirect()->route('login');
    }

    // Show login form.
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Logs in the user with validated credentials.
     *
     * Validates the login request, attempts authentication, regenerates the session on success,
     * and redirects to the intended page or the admin page. On failure, returns with an error message.
     *
     * @param   \App\Http\Requests\LoginRequest  $request  The login request with validated credentials.
     * @return  \Illuminate\Http\RedirectResponse          Redirects on success or returns with errors on failure.
     */
    public function login(LoginRequest $request)
    {
        // Validate email and password
        $credentials = $request->validated();

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Prevent session fixation attacks
            return redirect()->intended(route('admin.index')); // Redirect admin page
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。'
        ]);
    }

    /**
     * Logs out the authenticated user.
     *
     * Logs out the user, invalidates the session, regenerates the CSRF token,
     * and redirects to the login page.
     *
     * @param  \Illuminate\Http\Request  $request  The logout request.
     * @return \Illuminate\Http\RedirectResponse   Redirects to the login page.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect('login'); // Redirect to login page
    }
}
