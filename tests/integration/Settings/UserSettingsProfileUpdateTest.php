<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsProfileUpdateTest extends TestCase
{

  use DatabaseTransactions;
  use MailTracking;

  /** @test */
  public function user_can_update_contact_info_from_the_main_settings_page()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings')
      ->see('Update Contact Information');
  }

  /** @test */
  public function user_can_update_their_name_and_email()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings')
      ->type('Taylor', 'name')
      ->type('taylor@example.com', 'email')
      ->press('Update');

    // Get the updated User from the database
    $user = App\User::find($user->id)->first();

    $this->assertTrue($user->name == 'Taylor');
    $this->assertTrue($user->email == 'taylor@example.com');
  }



  /** @test */
  public function user_can_update_just_their_name()
  {
    $user = factory(App\User::class, 1)->create();
    $userEmailOld = $user->email;

    $this->actingAs($user)
      ->visit('/settings')
      ->type('Taylor', 'name')
      ->press('Update');

    // Get the updated User from the database
    $user = App\User::find($user->id)->first();

    $this->assertTrue($user->name == 'Taylor');
    $this->assertTrue($user->email == $userEmailOld);

  }

  /** @test */
  public function user_can_update_just_their_email()
  {
    $user = factory(App\User::class, 1)->create();
    $userNameOld = $user->name;

    $this->actingAs($user)
      ->visit('/settings')
      ->type('taylor@example.com', 'email')
      ->press('Update');

    // Get the updated User from the database
    $user = App\User::find($user->id)->first();

    $this->assertTrue($user->email == 'taylor@example.com');
    $this->assertTrue($user->name == $userNameOld);
  }

  /** @test */
  public function user_should_see_their_contact_information_in_the_form()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings')
      ->see($user->email);
  }

  /** @test */
  public function after_user_updates_contact_info_they_are_redirected_back_to_the_settings_page_with_a_flash_message()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings')
      ->type('Taylor', 'name')
      ->type('taylor@example.com', 'email')
      ->press('Update')
      ->seePageIs('/settings')
      ->see('Update Contact Information')
      ->see('Your contact information has been successfully updated.');
  }

  /** @test */
  public function contact_info_form_is_validated()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings')
      ->type('r', 'name')
      ->press('Update')
      ->seePageIs('/settings')
      ->see('The name must be at least 2 characters.');
  }

  /** @test */
  public function user_is_emailed_after_updating_their_contact_info()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings')
      ->type('Taylor', 'name')
      ->type('taylor@example.com', 'email')
      ->press('Update')

      ->seeEmailWasSent()
      ->seeEmailSubject('Your contact information has been updated')
      ->seeEmailTo($user->email);
  }



}
