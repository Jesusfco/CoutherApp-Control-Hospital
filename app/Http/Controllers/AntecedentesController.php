<?php

namespace App\Http\Controllers;

use App\Antecedente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntecedentesController extends Controller
{
    public function __construct()
    {
        $this->middleware('myAuth');
        // $this->middleware('medico');
        // $this->middleware('admin', ['only' => ['delete', 'update', 'edit']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $objects = Antecedente::whereNotNull('id');        

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
        
        return view('app/antecedentes/list')->with('objects', $objects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app/antecedentes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antecedente = Antecedente::create($request->all());
        
        return redirect("app/antecedentes/{$antecedente->id}")->with('msj', 'Antecedente Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function show(Antecedente $antecedente)
    {
        return view('app/antecedentes/show')->with('obj', $antecedente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function edit(Antecedente $antecedente)
    {
        return view('app/antecedentes/edit')->with('obj', $antecedente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antecedente $antecedente)
    {
        $antecedente->fill($request->all());
        $antecedente->save();
        return back()->with('msj', 'Antecedente Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antecedente  $antecedente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antecedente $antecedente)
    {
        $antecedente->delete();
        return response('Expediente Eliminado');
    }

    public function getPDF($id)
    {
        $antecedente = Antecedente::find($id);
        // $pdf = new \PDF;
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf/antecedente', ['obj' => $antecedente, 'pdf' => $pdf]);        
        return $pdf->stream('HistoriaClinica.pdf');
    }
}
