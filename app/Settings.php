<?php

namespace App;

class Settings
{
  // public static function hello(){
  //   return config('settings.billing');
  // }

  public static function numberOfActivePlans(){
    $array = config('settings.billing');
    $number = 0;
    foreach ($array as $key => $plan) {
      if ( $key != 'free'){
        if ($plan["active"]){
          $number++;
        }
      }
    }
    return $number;
  }
}
