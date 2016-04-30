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

  // /** @test */
  // public function when_user_is_created_they_are_automatically_assigned_as_free_user()
  // {
  //   // $user = factory(App\User::class, 1)->create();
  //   // $this->assertTrue($user->role() == 'client');
  //   // $this->assertTrue($user->access() == 'free');
  // }
  //
  // /** @test */
  // public function users_role_and_access_can_be_accessed_by_eloquent_relationships()
  // {
  //   // $user = factory(App\User::class, 1)->create();
  //   // $this->assertTrue($user->role->name == 'client');
  //   // $this->assertTrue($user->access->name == 'free');
  // }
  //

  protected function registerNewUser()
  {
    $this->visit('/register')
        ->type('Taylor', 'name')
        ->type('taylor@example.com', 'email')
        ->type('RandomPassword', 'password')
        ->type('RandomPassword', 'password_confirmation')
        ->press('Register');

    return \App\User::find(1);
  }
}
