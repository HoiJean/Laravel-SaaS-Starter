<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsPasswordUpdateTest extends TestCase
{

  use DatabaseTransactions;

  /** @test */
  public function example()
  {
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login');
  }
  //
  // /** @test */
  // public function user_can_navigate_to_the_update_password_tab()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function user_can_update_their_password()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  // /** @test */
  // public function user_is_emailed_after_updating_their_password()
  // {
  //   // Given
  //   // When
  //   // Then
  // }
  //
  //



}
