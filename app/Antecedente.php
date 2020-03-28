<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    protected $fillable = [
        'id_paciente', 
        'tiempo_embarazo', 
        'complicaciones_embarazo', 
        'complicaciones_parto', 
        'fumaba_embarazo', 
        'alcohol_embarazo', 
        'exposicion_toxicos',
        'fisuras_padres', 
        'fisuras_parientes'
    ];
}
