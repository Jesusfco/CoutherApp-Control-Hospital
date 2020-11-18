<?php

namespace App\Http\Controllers;

use App\Control;
use App\Direccion;
use App\Http\Requests\Paciente\Store;
use App\Http\Requests\Paciente\Update;
use App\User;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('myAuth');
        $this->middleware('doctor');
    }

    public function list(Request $re) {

        $objects = User::whereName($re->term)
            ->where('user_type',  1)
            ->orderBy('name','asc')            
            ->paginate(20);
        return view('app/pacientes/list')->with('objects', $objects);
    }

    public function create(){        
        return view('app/pacientes/create');
    }

    public function store(Store $re) {        
         
        $obj = new User();
        $this->pushData($re, $obj);        
       
        // $this->show($obj->id);
        
        return redirect('app/pacientes/ver/' . $obj->id)->with('msj', 'Se ha creado un paciente con exito');
    }

    public function edit($id) {
        $obj = User::find($id);
        return view('app/pacientes/edit')->with('obj', $obj);
    }
    public function show($id) {
        $obj = User::find($id);
        return view('app/pacientes/show')->with('obj', $obj);
    }

    public function update(Update $re, $id) 
    {                
 
        $obj = User::find($id);
        $this->pushData($re, $obj);       
            
        return back()->with('success', 'Se ha actualizado el usuario con exito');

    }

    public function delete($id) {
        
        $n = User::find($id);          
        $n->delete();
        return 'true';
    }

    public function controles($id) {
        $user = User::find($id);          
        $controles = Control::where('paciente_id', $id)->orderBy('created_at', 'DESC')->with('medico')->paginate(20);
        return view('app/pacientes/controles')->with([
                'controles' => $controles, 
                'user' => $user
            ]);
    }

    private function pushData(Request $re, User $obj) {
        
        $obj->name = $re->name;
        $obj->paterno = $re->paterno;
        $obj->materno = $re->materno;
        $obj->email = $re->email;
        $obj->curp = $re->curp;
        $obj->nacimiento = $re->nacimiento;
        $obj->status = $re->status;
        $obj->no_empleado = $re->no_empleado;
        $obj->area = $re->area;
        $obj->sexo = $re->sexo;
        if($re->password == NULL && $obj->id == NULL) $obj->password = bcrypt('secret');        
        else $obj->password = bcrypt($re->password);                               
        // $obj->user_type = $re->user_type;   
        $obj->user_type = 1;   
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
