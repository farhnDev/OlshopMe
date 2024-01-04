<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showAdminRegisterForm()
    {
        return view('auth.admin_register');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $password = bcrypt($request->password);

        if ($password === null) {
            return redirect()->back()->withErrors(['password' => 'Password is invalid']);
        }
        $user = new User([
            'id' => (string) Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        if (!$user->save()) {
            return redirect()->back()->withErrors(['user' => 'User could not be created']);
        }

        if ($request->register_as_admin) {
            $user->assignRole('admin');
            if ($user->hasRole('admin')) {
                Log::info("User {$user->uuid} has been assigned the 'admin' role.");
            } else {
                Log::error("Failed to assign the 'admin' role to user {$user->uuid}.");
            }
        }
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
