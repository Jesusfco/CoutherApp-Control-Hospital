<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UtilController extends Controller
{

    public function __construct()
    {
        $this->middleware('myAuth');
        // $this->middleware('admin');
    }

    public function dashboard() {   

        return view('app/dashboard')->with([
            'businessPend' => "",
            
        ]);
    }

    public function sugestPacientes(Request $re) {
        return response()->json(
            User::whereName($re->term)
                ->formatSujest()
                ->limit(10)->get()
        );
    }
}
