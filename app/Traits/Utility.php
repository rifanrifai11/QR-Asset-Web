<?php
namespace App\Traits;
/**
 * Created by PhpStorm.
 * User: Eko
 * Date: 04/12/2017
 * Time: 07.58
 */
trait Utility
{
    public function getNameOfDayInIndonesia($dayOfWeek){
        $dayName=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        return $dayName[$dayOfWeek];
    }
}