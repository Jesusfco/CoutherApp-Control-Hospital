<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisisPhoto extends Model
{
    public function analisisPhotos() 
    {
        return $this->hasMany(AnalisisPhoto::class);
    }
}
