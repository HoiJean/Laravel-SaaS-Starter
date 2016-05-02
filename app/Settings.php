<?php

namespace App;

class Settings
{

  protected $billing;

  public function __construct()
  {
    $this->billing = config('settings.billing');
  }

  public static function countPlans(){
    $settings = new Settings();
    return $settings->countBillingPlans();
  }

  public static function countPlansFree(){
    $settings = new Settings();
    return $settings->countBillingPlans(true);
  }

  public function countBillingPlans($includeFree = false){
    $number = 0;
    foreach ($this->billing as $planName => $plan) {
      if ($plan["active"]){
        if ( $planName == 'free'){
          if($includeFree){
            $number++;
          }
        }
        else{
          $number++;
        }
      }
    }
    return $number;
  }

}
