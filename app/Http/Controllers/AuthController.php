<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        
        if(Auth::check() )            
            return redirect('/app');     
        return view('auth/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('msj', 'Tu sesion ha sido cerrada');
    }

    public function signIn(Request $re) {

        $credentials = $re->only('email', 'password');

        if (Auth::attempt($credentials)) 
            return redirect('/app');                 
        else 
            return back()->with('error', "La contraseña o correo son incorrectos");

    }
}
