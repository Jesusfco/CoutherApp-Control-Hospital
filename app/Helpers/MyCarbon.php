<?php

namespace App\Helpers;

class MyCarbon {

    static public function getDayWeekName($number) {
        if($number == 0) return "Domingo";
        if($number == 1) return "Lunes";
        if($number == 2) return "Martes";
        if($number == 3) return "Miercoles";
        if($number == 4) return "Jueves";
        if($number == 5) return "Viernes";
        return "Sabado";        
        
    }

    static public function getMonthName($i) { 
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        return $meses[$i - 1];
    }
}