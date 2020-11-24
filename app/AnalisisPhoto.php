<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisisPhoto extends Model
{
    public function analisis() 
    {
        return $this->belongsTo(Analisis::class);
    }
}
