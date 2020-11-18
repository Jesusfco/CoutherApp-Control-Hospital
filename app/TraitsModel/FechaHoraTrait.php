<?php

namespace App\TraitsModel;

use App\Helpers\MyCarbon;
use Carbon\Carbon;

trait FechaHoraTrait
{
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