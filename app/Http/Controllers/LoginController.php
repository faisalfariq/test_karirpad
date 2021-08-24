<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->level=='superuser'){
                return redirect()->intended('produk');
            }
            else{
                return redirect()->intended('user_produk');
            }

            
        }

        return back()->with('loginerror','Login Gagal');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');

    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

 
}
