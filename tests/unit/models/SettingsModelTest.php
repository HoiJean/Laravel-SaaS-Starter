<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Settings;

class SettingsModelTest extends TestCase
{

  use DatabaseTransactions;

  protected $billing = [];

  public function setUp(){
    parent::setUp();

    $this->billing = $this->setupBillingArray();
    $this->updateBillingConfig();

  }

  /** @test */
  public function it_can_return_the_number_of_active_plans()
  {

    $this->assertTrue( Settings::countPlans() == 3);

    $this->billing['standard']['active'] = false;
    $this->updateBillingConfig();
    $this->assertTrue( Settings::countPlans() == 2);

    $this->billing['gold']['active'] = false;
    $this->updateBillingConfig();

    $this->assertTrue( Settings::countPlans() == 1);
  }

  /** @test */
  public function it_can_return_number_of_active_plans_with_free()
  {
    $this->assertTrue( Settings::countPlansFree() == 4);
  }

  /** @test */
  public function it_can_return_a_multi_array_for_the_plans_without_free_plan()
  {
    $this->assertTrue( count(Settings::getPlans()) == 3);
    $this->billing['gold']['active'] = false;
    $this->updateBillingConfig();

    $this->assertTrue( count(Settings::getPlans()) == 2);
  }

  /** @test */
  public function it_can_return_a_multi_array_for_the_plans_with_free_plan()
  {
    $this->assertTrue( count(Settings::getPlansFree()) == 4);
    $this->billing['free']['active'] = false;
    $this->updateBillingConfig();

    $this->assertTrue( count(Settings::getPlansFree()) == 3);
  }




  protected function setupBillingArray(){
    return [
      'free' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => true,
        'currency' => '€',
        'price' => '27',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

      'standard' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => false,
        'currency' => '€',
        'price' => '99',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

      'premium' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => true,
        'currency' => '€',
        'price' => '299',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

      'gold' =>[
        'active' => true,
        'stripe_plan_id' => 'standard',
        'plan_name' => 'Standard',
        'most_popular' => false,
        'currency' => '€',
        'price' => '399',
        'billing_cycle' => 'Per Month',
        'button_name' => 'Get Started',
        'features' => [
          'Feature 1',
          'Feature 2',
          'Feature 3',
          'Feature 4',
          'Feature 5',
        ],
      ],

    ];
  }

  protected function updateBillingConfig(){
    config(['settings.billing' => $this->billing]);
  }

}
