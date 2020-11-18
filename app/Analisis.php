<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $fillable = [ 
        'paciente_id',
        'descripcion',
        'observacion',
        'fecha',
    ];

    public function analisisPhotos() 
    {
        return $this->hasMany(AnalisisPhoto::class);
    }
    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id')->withDefault([ 'name' => ' Paciente desconocido']);
    }
}
