<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $primaryKey = "user_id";
    public $incrementing = false;
    public $timestamps = false; 

    protected $fillable = [
        'user_id', 
        'calle', 
        'colonia',         
        'numero', 
        'numero_int', 
        'cp', 
        'ciudad', 
        'estado',         
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
