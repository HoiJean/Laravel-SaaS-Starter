<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsAccessTest extends TestCase
{

  use DatabaseTransactions;

  /** @test */
  public function user_who_is_logged_in_can_access_settings_from_dropdown_menu_item()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
     ->visit('/dashboard')
     ->click($user->name)
     ->click('Settings')
     ->seePageIs('/settings');

  }

  /** @test */
  public function guest_can_not_access_settings()
  {
    $this->visit('/settings')
      ->seePageIs('/login');
  }

  /** @test */
  public function settings_page_has_the_standard_menu_bar()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
     ->visit('/settings')
     ->see($user->name);
  }



}
