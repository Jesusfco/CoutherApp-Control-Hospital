<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reset extends Model
{
    protected $table = 'password_resets';

    protected $fillable = [
        'user_id', 'token'
    ];

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'token';
    private $tokenLenght = 50;

    public function user(){
        return $this->belongsTo('App\User');
    }   

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function makeToken(){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->tokenLenght; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;

    }

    public function save2($user_id){
        $this->user_id = $user_id;
        $this->token = $this->makeToken();
        $this->save();
    }

}
