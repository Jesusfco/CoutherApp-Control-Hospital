<?php

namespace App\Http\Controllers;

use App\Control;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class ControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('myAuth');
        $this->middleware('doctor');
        $this->middleware('admin', ['only' => ['delete', 'update', 'edit']]); 
    }

    public function index(Request $re) {

        $objects = Control::whereNotNull('id');        

        if($re->search_type == 1) {
           $objects->whereHas('paciente', function ($query) use ($re){
                $query->where(DB::raw("CONCAT(`name`, ' ', IFNULL(`paterno`, ''), ' ', IFNULL(`materno`, ''))"), 'LIKE', '%' . $re->term . '%');
            });
        } else {
           $objects->whereHas('medico', function ($query) use ($re){
                $query->where(DB::raw("CONCAT(`name`, ' ', IFNULL(`paterno`, ''), ' ', IFNULL(`materno`, ''))"), 'LIKE', '%' . $re->term . '%');
            });
        }        

        $objects = $objects->orderBy('created_at','DESC')   
            ->with('paciente', 'medico')->paginate(20); 
        
        return view('app/controles/list')->with('objects', $objects);
    }

    public function create(){        
        return view('app/controles/create');
    }

    public function store(Request $re) {                
        $obj = new Control();
        $this->pushData($re, $obj);                
        return redirect('app/control/' . $obj->id)->with('msj', 'Se ha creado un Control con exito');
    }

    public function edit($id) {
        $obj = Control::find($id);
        return view('app/controles/edit')->with('obj', $obj);
    }
    public function show($id) {
        $obj = Control::find($id);
        return view('app/controles/show')->with('obj', $obj);
    }

    public function update(Request $re, $id) {                

        $obj = Control::find($id);
        $this->pushData($re, $obj);                   
        return back()->with('success', 'Se ha actualizado el Control con exito');

    }

    public function delete($id) {
        
        $n = Control::find($id);          
        $n->delete();
        return 'true';
    }

    private function pushData(Request $re, Control $obj) {
        
        if($obj->id > 0)$obj->medico_id = $re->medico_id;
        else $obj->medico_id = Auth::id();
        
        $obj->paciente_id = $re->paciente_id;
        $obj->telefono = $re->telefono;
        $obj->alergias = $re->alergias;
        $obj->TA = $re->TA;
        $obj->peso = $re->peso;
        $obj->talla = $re->talla;
        $obj->temperatura = $re->temperatura;
        $obj->IMC = $re->IMC;
        $obj->SPO2 = $re->SPO2;
        $obj->FC = $re->FC;
        $obj->FR = $re->FR;
        $obj->DXTX = $re->DXTX;
        $obj->p = $re->p;
        $obj->s = $re->s;
        $obj->o = $re->o;
        $obj->a = $re->a;
        $obj->diagnostico = $re->diagnostico;
        $obj->pronostico = $re->pronostico;
        $obj->plan = $re->plan;
        
        $obj->save();

        
                              
    }

    public function pdf($id) {

        $obj = Control::find($id);
        // return view('pdf/control', ['obj' => $obj]);
        return PDF::loadView('pdf/control',['obj' => $obj])
        ->stream('control.pdf');

    }
}
