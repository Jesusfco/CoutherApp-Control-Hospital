<?php

namespace App;

use App\TraitsModel\FechaHoraTrait;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use FechaHoraTrait;
    protected $fillable = [ 
        'paciente_id',
        'creator_id',
        'tipo',
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
