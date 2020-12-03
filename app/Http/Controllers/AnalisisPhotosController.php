<?php

namespace App\Http\Controllers;

use App\AnalisisPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnalisisPhotosController extends Controller
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
    public function index(Request $request)
    {
        
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img_file = $request->file('img_file');

        $analisisPhoto = new AnalisisPhoto;
        $analisisPhoto->path = str_replace(' ', '_', $img_file->getClientOriginalName());
        $analisisPhoto->analisis_id = $request->analisis_id;
        $analisisPhoto->save();
        $analisisPhoto->path = $analisisPhoto->id."_".$analisisPhoto->path;
        $analisisPhoto->save();
        Storage::disk('analisis')->put($analisisPhoto->path, file_get_contents($img_file));
        return response($analisisPhoto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalisisPhoto  $analisisPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisisPhoto $analisisPhoto)
    {
        //
    }

     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalisisPhoto  $analisisPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnalisisPhoto $analisisPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalisisPhoto  $analisisPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalisisPhoto $analisisPhoto)
    {
        $analisisPhoto->delete();
        return response("success");
    }
}
