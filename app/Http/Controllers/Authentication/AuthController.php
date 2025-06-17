<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthController extends Controller
{
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        $userId = DB::table('users')->insertGetId([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Auth::loginUsingId($userId);
        // dd($request->all());
        return redirect(RouteServiceProvider::DASHBOARD_CLIENT);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            
            if ($role === 'admin') {
                return redirect(RouteServiceProvider::DASHBOARD_ADMIN);
            } else {
                return redirect(RouteServiceProvider::DASHBOARD_CLIENT);
            }
        }
        return back()->withErrors([
            'email' => ' Email hoac mat khau khong dung',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login');
    }

    public function show(){
        return view('user.dashboard');
    }
}
