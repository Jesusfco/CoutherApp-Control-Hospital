<?php

namespace App\Http\Controllers;

use App\User;
use App\Direccion;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('myAuth');
        $this->middleware('admin');
    }

    public function list(Request $re) {

        $objects = User::whereName($re->term)
            ->where('user_type', '>', 1)
            ->orderBy('name','asc')            
            ->paginate(20);
        return view('app/user/list')->with('objects', $objects);
    }

    public function create(){        
        return view('app/user/create');
    }

    public function store(Request $re) {        
        $check = NULL;
        if( $re->email != NULL)
            $check = User::where('email', 'LIKE', $re->email)->first();        
        if($check != NULL) 
            return back()
            ->with('error', 'Correo repetido "'. $re->email . '" - No se puede crear otro usuario con el mismo correo')
            ->withErrors(['email.unique', 'Correo repetido "'. $re->email . '"'])
            ->withInput();
        $obj = new User();
        $this->pushData($re, $obj);        
       
        // $this->show($obj->id);
        
        return redirect('app/usuarios/ver/' . $obj->id)->with('msj', 'Se ha creado un usuario con exito');
    }

    public function edit($id) {
        $obj = User::find($id);
        return view('app/user/edit')->with('obj', $obj);
    }
    public function show($id) {
        $obj = User::find($id);
        return view('app/user/show')->with('obj', $obj);
    }

    public function update(Request $re, $id) {
        
        $obj = User::find($id);
        $check = User::where('email', 'LIKE', $re->email)->first();

        if($check != NULL)
            if($check->id != $id) 
                return back()->with('error', 'Correo repetido "'. $re->email . '" - No se puede tener mas de un usuario con el mismo correo');

        $this->pushData($re, $obj);       
            
        return back()->with('success', 'Se ha actualizado el usuario con exito');

    }

    public function delete($id) {
        
        $n = User::find($id);          
        $n->delete();
        return 'true';
    }

    private function pushData(Request $re, User $obj) {
        
        $obj->name = $re->name;
        $obj->paterno = $re->paterno;
        $obj->materno = $re->materno;
        $obj->email = $re->email;
        $obj->curp = $re->curp;
        $obj->nacimiento = $re->nacimiento;
        $obj->especialidad = $re->especialidad;
        $obj->cedula = $re->cedula;
        $obj->sexo = $re->sexo;
        if($re->password == NULL && $obj->id == NULL) $obj->password = bcrypt('secret');        
        else $obj->password = bcrypt($re->password);                               
        $obj->user_type = $re->user_type;   
        $obj->save();

        $direccion = Direccion::find($obj->id);
        if($direccion == NULL) {
            $direccion = new Direccion(); 
            $direccion->user_id = $obj->id;
        }
        $direccion->calle = $re->calle;
        $direccion->colonia = $re->colonia;
        $direccion->numero = $re->numero;
        $direccion->numero_int = $re->numero_int;
        $direccion->cp = $re->cp;
        $direccion->ciudad = $re->ciudad;
        $direccion->estado = $re->estado;
        $direccion->save();
                              
    }
}
