<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Reset;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;
use Auth;

class ResetPasswordController extends Controller
{

    public function resetPassword(){
        return view('auth/email');
    }
    
    public function reset(Request $re) {

        $user = User::where('email', 'LIKE', $re->email)->first();

        if($user == NULL){                         
            return back()->withInput()
            ->withErrors(['email', 'Correo Inexistente']);
        }

        $this->deleteTokenWithId($user->id);
        $token = New Reset();       
        $token->save2($user->id);

        $data = [];
        $data['user'] = $user;
        $data['token'] = $token;

        Mail::send(new ResetMail($data));
    
        return back()->with('success', 'Correo enviado');

    }

   

    public function checkToken($token) {       
        $t = Reset::find($token);
        if($t == NULL) return redirect('/login');
        
        return view('auth/reset')->with('email', $t->user->email);        
        
    }

    public function changePassword(Request $re) {

        $t = Reset::find($re->token);

        if($t == NULL) return redirect('/login');

        $this->deleteTokenWithId($t->user_id);

        // $user = User::where('email', 'LIKE', $t->email)->first();        
        $t->user->password = bcrypt($re->password);
        $t->user->save();

        return redirect('/app')->with('success', 'La contraseña ha sido restaurada. Nueva contraseña: '. $re->password);
        
    }

    private function deleteTokenWithId($id) {
        Reset::where('user_id', $id)->delete();
    }
    
}
