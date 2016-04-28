<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAuthTest extends TestCase
{

  use DatabaseTransactions;

  /** @test */
  public function home_page_links_to_login_page()
  {
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login');
  }

  /** @test */
  public function home_page_links_to_register_page()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register');
  }

  /** @test */
  public function guest_is_redirected_to_login_when_trying_to_access_dashboard()
  {
    $this->visit('/dashboard')
      ->seePageIs('/login');
  }

  /** @test */
  public function guest_is_redirected_to_root_when_trying_to_access_logout()
  {
    $this->visit('/logout')
      ->seePageIs('/');
  }

  /** @test */
  public function when_user_is_logged_in_they_cannot_access_the_login_page()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
     ->visit('/login')
     ->seePageIs('/');
  }

  /** @test */
  public function when_user_is_logged_in_they_cannot_access_the_register_page()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
     ->visit('/register')
     ->seePageIs('/');
  }

  // /** @test */
  // public function when_user_logs_in_they_are_redirected_to_the_dashboard()
  // {
  //   // $user = factory(App\User::class, 1)->create();
  //   // When
  //   // Then
  // }
}
