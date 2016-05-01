<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserPermissionsTest extends TestCase
{

  use DatabaseTransactions;

  /** @test */
  public function when_user_registers_they_are_assigned_a_role_with_the_name_of_client()
  {
    $user = $this->registerNewUser();

    $this->assertTrue($user->roles->first()->name == 'client');
    $this->assertTrue($user->role() == 'client');

  }

  /** @test */
  public function when_user_registers_they_are_assigned_a_access_with_the_name_of_free()
  {
    $user = $this->registerNewUser();

    $this->assertTrue($user->accesses->first()->name == 'free');
    $this->assertTrue($user->access() == 'free');
  }

  /** @test */
  public function free_users_can_only_access_free_routes()
  {
    $user = $this->createUser();

    $this->actingAs($user)
       ->visit('/dashboard')
       ->click('Free Users Areas')
       ->seePageIs('/free');

    $this->actingAs($user)
      ->visit('/dashboard')
      ->click('Standard Users Areas');
      // ->seePageIs('/upgrade');

  //   $this->actingAs($user)
  //      ->visit('/dashboard')
  //      ->click('Premium Users Areas')
  //      ->seePageIs('/upgrade');
   //
  //  $this->actingAs($user)
  //     ->visit('/dashboard')
  //     ->click('Gold Users Areas')
  //     ->seePageIs('/upgrade');

  }

}
