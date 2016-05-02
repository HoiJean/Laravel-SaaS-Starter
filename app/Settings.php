<?php

namespace App;

class Settings
{

  protected $billing;

  public function __construct()
  {
    $this->billing = config('settings.billing');
  }

  public function numberOfActivePlans($countFree = null){
// dd('test');
    $number = 0;
    // dd($this->billing);
    foreach ($this->billing as $key => $plan) {
      if ( $key == 'free'){
        if($countFree == 'free')
          if ($plan["active"]){
            $number++;
          }
        }
      else{
        if ($plan["active"]){
          $number++;
        }
      }
    }
    return $number;
  }

}
