<?php

namespace App\Http\Controllers;

use App\Analisis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalisisController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
