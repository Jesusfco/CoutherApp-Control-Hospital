<?php

namespace App;

use App\TraitsModel\FechaHoraTrait;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use FechaHoraTrait;
    protected $fillable = [
        'paciente_id', 
        'medico_id', 
        'telefono', 
        'alergias', 
        'TA', 
        'peso', 
        'talla',
        'temperatura', 
        'IMC', 
        'SPO2', 
        'FC', 
        'FR', 
        'DXTX', 
        'p', 
        's', 
        'o', 
        'a', 
        'diagnostico', 
        'pronostico', 
        'plan',    
        'no_folio',                      
    ];

    public function paciente(){
        return $this->belongsTo('App\User')->withDefault([
            'name' => 'Paciente Desconocido',
        ]);
    }
    public function medico(){
        return $this->belongsTo('App\User')->withDefault([
            'name' => 'Medico Desconocido',
        ]);
    }

    
}
