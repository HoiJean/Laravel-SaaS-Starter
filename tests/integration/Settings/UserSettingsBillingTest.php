<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsBillingTest extends TestCase
{

  use DatabaseTransactions;

  /** @test */
  public function example()
  {
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login');
  }



}
