<?php

namespace App;

use App\Helpers\MyCarbon;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'paterno', 'materno', 
        'nacimiento', 'curp', 'user_type', 'sexo',
        'cedula', 'especialidad', #Medicos
        'status','no_empleado', 'area' #pacientes
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
    public function direccion() {
        return $this->hasOne('App\Direccion')->withDefault();
    }

    public function type() {
        if($this->user_type  == 1) return 'Paciente';
        if($this->user_type  == 2) return 'Doctor';
        return "Administrador";
    }

    public function edad(){
        if($this->nacimiento == NULL) return 'Desconocido';

        list($ano,$mes,$dia) = explode("-",$this->nacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;

    }
    
    public function fullname() { return "$this->name $this->paterno $this->materno"; }
    public function getNombreCompletoAttribute()
    {
        return "{$this->name} {$this->paterno} {$this->materno}";
    }
    public function scopeFormatSujest($query) {
        return $query->select(DB::raw("CONCAT(`name`, ' ', IFNULL(`paterno`, ''), ' ', IFNULL(`materno`, '')) AS value"), DB::raw("id AS data"));
    }

    public function scopeWhereName($query, $name) {
        return $query->where(DB::raw("CONCAT(`name`, ' ', IFNULL(`paterno`, ''), ' ', IFNULL(`materno`, ''))"), 'LIKE', '%' . $name . '%');
    }

    public function getNacimientoFormat() {
        if($this->nacimiento == NULL) return "-----------";
        $nacimiento = Carbon::parse($this->nacimiento);

        return $nacimiento->isoFormat("DD") . " " . MyCarbon::getMonthName($nacimiento->month) . " " . $nacimiento->year;
    }

    public function antecedentes()
    {
        return $this->hasMany(Antecedente::class, 'paciente_id');
    }
    public function antecedentes_medico()
    {
        return $this->hasMany(Antecedente::class, 'medico_id');
    }
    public function control()
    {
        return $this->hasMany(Control::class, 'paciente_id');
    }
    public function control_medico()
    {
        return $this->hasMany(Control::class, 'medico_id');
    }
}
