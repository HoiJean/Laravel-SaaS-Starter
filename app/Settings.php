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
    return count($settings->getBillingPlans());
  }

  public static function countPlansFree(){
    $settings = new Settings();
    return count($settings->getBillingPlans(true));
  }

  public static function getPlans(){
    $settings = new Settings();
    return $settings->getBillingPlans();
  }

  public static function getPlansFree(){
    $settings = new Settings();
    return $settings->getBillingPlans(true);
  }

  public function getBillingPlans($includeFree = false){
    $returnArray = [];
    foreach ($this->billing as $planName => $plan) {
      if ($plan["active"]){
        if ( $planName == 'free'){
          if($includeFree){
            $returnArray[] = $plan;
          }
        }
        else{
          $returnArray[] = $plan;
        }
      }
    }
    return $returnArray;
  }

}
