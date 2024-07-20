<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()  
    {
        return view('pages.auth.login');
    }
    
    public function login(Request $request)
    {
        $validatedUser = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedUser)) {
            return redirect()->route('tipemobil.index');
        } else {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    } 
}
