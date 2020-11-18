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
        try {
            $user = Auth::user()->fullname();
            Auth::logout();
            return redirect('/')->with('msj', 'Tu sesion ha sido cerrada ' . $user);
        } catch (\Throwable $th) {
            return redirect('/')->with('msj', 'Tu sesion ha sido cerrada ');
        }

        
        
    }

    public function signIn(Request $re) 
    {
        $credentials = $re->only('email', 'password');        
        if (Auth::attempt($credentials)) 

            if(Auth::user()->user_type == 2)
                return redirect('/app/control');
            else                 
                return redirect('/app/usuarios');

        else 

            return back()->with('error', "La contraseña o correo son incorrectos")->withInput();

    }
}
