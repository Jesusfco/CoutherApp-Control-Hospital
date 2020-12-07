<?php

namespace App;

use App\TraitsModel\FechaHoraTrait;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use FechaHoraTrait;
    protected $fillable = [
        'paciente_id', 
        'medico_id', 
        // 'alergias', 
        'heredofamiliares', 
        'personales_no_patologicos', 
        'personales_patologicos', 
        'musculo_esqueletico', 
        'piel_anexos', 
        // Datos En tabla
        'peso', 
        'mm_hg', 
        'temperatura', 
        'frecuencia_respiratoria',
        'frecuencia_cardiaca',
        'talla', 
        // 
        'habitus_exterior',
        'cabeza',
        'cuello',
        'torax',
        'abdomen',
        'genitales',
        'respiratorio',
        'cardiovascular',
        'digestivo',
        'urinario',
        'reproductor',
        'hemolinfatico',
        'endocrino',
        'sistema_nervioso',
        'exploracion_ginecologica',
        'columna_vertebral',
        'extremidades',
        'exploracion_neurologica',
        'diagnostico',
        'plan',
        'no_folio',         
        'sintomas_generales',
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
