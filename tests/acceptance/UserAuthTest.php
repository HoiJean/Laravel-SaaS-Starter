<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAuthTest extends TestCase
{
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
}
