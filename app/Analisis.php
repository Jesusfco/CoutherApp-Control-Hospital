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

    public function images() 
    {
        return $this->hasMany(AnalisisPhoto::class);
    }
    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id')->withDefault([ 'name' => ' Paciente desconocido']);
    }

    public function delete()
    {
        foreach ($this->images as $image) {
            $image->delete();
        }
        parent::delete();
    }
}
