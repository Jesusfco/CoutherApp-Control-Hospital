<?php

namespace App;

use App\TraitsModel\FechaHoraTrait;
use Illuminate\Database\Eloquent\Model;

class MonitoreoGlucosa extends Model
{
    use FechaHoraTrait;
    protected $fillable = [ 
        'paciente_id',
        'medico_id',                 
        'no_folio',                 
    ];
    
    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_id')->withDefault([ 'name' => ' Médico desconocido']);
    }
    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id')->withDefault([ 'name' => ' Paciente desconocido']);
    }
}
