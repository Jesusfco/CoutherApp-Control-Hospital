<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AnalisisPhoto extends Model
{
    protected $appends = ['full_path'];
    public function analisis() 
    {
        return $this->belongsTo(Analisis::class);
    }

    public function getFullPathAttribute()
    {
        return url("img/analisis/{$this->path}");
    }

    public function delete()
    {
        Storage::disk('analisis')->delete($this->path);
        parent::delete();
    }
}
