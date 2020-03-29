<?php

namespace App;

use App\Helpers\MyCarbon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
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

    public function getFechaFormat() {
        
        $date = Carbon::parse($this->created_at);
        
        
        $text = MyCarbon::getDayWeekName($date->dayOfWeek) . " ";
        $text .= $date->day . " de " . MyCarbon::getMonthName($date->month) . " " . $date->year;

        return $text;
    }

    public function getHourFormat() {
        $date = Carbon::parse($this->created_at);
        return $date->hour . ":" . $date->minute;
    }
}
