<?php

namespace App;

class Settings
{

  protected $billing;

  public function __construct()
  {
    $this->billing = config('settings.billing');
  }

  public function countPlans(){
    return $this->countBillingPlans();
  }

  public function countPlansFree(){
    return $this->countBillingPlans(true);
  }

  private function countBillingPlans($includeFree = false){
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
