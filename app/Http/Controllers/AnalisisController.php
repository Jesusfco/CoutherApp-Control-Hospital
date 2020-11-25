<?php

namespace App\Http\Controllers;

use App\Analisis;
use App\Http\Requests\Analisis\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnalisisController extends Controller
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
        $objects = Analisis::whereNotNull('id');        

        if($re->search_type == 1) {
           $objects->whereHas('paciente', function ($query) use ($re){
                $query->where(DB::raw("CONCAT(`name`, ' ', IFNULL(`paterno`, ''), ' ', IFNULL(`materno`, ''))"), 'LIKE', '%' . $re->term . '%');
            });
        }  

        $objects = $objects->orderBy('created_at','DESC')   
            ->with('paciente')->paginate(20); 
                    
        return view('app/analisis/list')->with('objects', $objects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app/analisis/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $request = $request->all();
        $request['creator_id'] = Auth::id();
        $analisis = Analisis::create($request);
        return redirect('app/analisis/'. $analisis->id . '/edit')->with('msj', 'Análisis creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analisis = Analisis::with('images')->find($id);        
        return view('app/analisis/show')->with('analisis', $analisis);
    }
    public function show_api($id)
    {
        $analisis = Analisis::with('images')->find($id);
        return response($analisis);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analisis = Analisis::find($id);
        return view('app/analisis/edit')->with('analisis', $analisis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $analisis = Analisis::find($id);
        $analisis->fill($request->all());
        $analisis->save();
        return back()->with('msj', 'Análisis updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
