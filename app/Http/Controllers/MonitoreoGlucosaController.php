<?php

namespace App\Http\Controllers;

use App\MonitoreoGlucosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoreoGlucosaController extends Controller
{
    public function __construct()
    {
        $this->middleware('myAuth');
        // $this->middleware('doctor');
        // $this->middleware('admin', ['only' => ['delete', 'update', 'edit']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $objects = MonitoreoGlucosa::whereNotNull('id');        

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
        
        return view('app/monitoreos/list')->with('objects', $objects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app/monitoreos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $monitoreo = MonitoreoGlucosa::create($request->all());
        return redirect("app/monitoreos")->with('msj', 'Monitoreo Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonitoreoGlucosa  $monitoreoGlucosa
     * @return \Illuminate\Http\Response
     */
    public function show(MonitoreoGlucosa $monitoreoGlucosa)
    {        
        return view('app/monitoreos/show')->with('obj', $monitoreoGlucosa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonitoreoGlucosa  $monitoreoGlucosa
     * @return \Illuminate\Http\Response
     */
    public function edit(MonitoreoGlucosa $monitoreoGlucosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonitoreoGlucosa  $monitoreoGlucosa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonitoreoGlucosa $monitoreoGlucosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonitoreoGlucosa  $monitoreoGlucosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonitoreoGlucosa $monitoreoGlucosa)
    {
        $monitoreoGlucosa->delete();
        return response("deleted");
    }

    public function getPDF($id)
    {
        $monitoreoGlucosa = MonitoreoGlucosa::find($id);
        return \PDF::loadView('pdf/monitoreos',['obj' => $monitoreoGlucosa])
        ->stream('monitoreo.pdf');
    }
}
