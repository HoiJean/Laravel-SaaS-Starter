<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsPasswordUpdateTest extends TestCase
{

  use DatabaseTransactions;
  use MailTracking;

  /** @test */
  public function user_can_update_their_password()
  {
    $user = App\User::create([
        'name' => 'Taylor',
        'email' => 'taylor@example.com',
        'password' => Hash::make('RandomPassword'),
    ]);

    $this->userUpdatePassword($user);

    // Get the updated User from the database
    $user = App\User::find($user->id)->first();

    $this->assertTrue(Hash::check('RandomPasswordNew', $user->password));

  }

  /** @test */
  public function after_user_updates_password_they_are_redirected_back_to_the_password_page_with_a_flash_message()
  {
    $user = factory(App\User::class, 1)->create();
    $this->userUpdatePassword($user);
    $this->seePageIs('/settings/password')
      ->see('Your password has been successfully updated.');
  }

  /** @test */
  public function password_form_is_validated()
  {
    $user = factory(App\User::class, 1)->create();
    $this->actingAs($user)
      ->visit('/settings/password')
      ->type('12345', 'password')
      ->type('12345', 'password_confirmation')
      ->press('Update')
      ->seePageIs('/settings/password')
      ->see('The password must be at least 6 characters.');

    $this->actingAs($user)
      ->visit('/settings/password')
      ->type('', 'password')
      ->type('', 'password_confirmation')
      ->press('Update')
      ->seePageIs('/settings/password')
      ->see('The password field is required.');

    $this->actingAs($user)
      ->visit('/settings/password')
      ->type('1234567', 'password')
      ->type('12345999', 'password_confirmation')
      ->press('Update')
      ->seePageIs('/settings/password')
      ->see('The password confirmation does not match.');
  }

  /** @test */
  public function user_is_emailed_after_updating_their_password()
  {
    $user = factory(App\User::class, 1)->create();
    $this->userUpdatePassword($user);
    $this->seeEmailWasSent()
      ->seeEmailSubject('Your password has been updated')
      ->seeEmailTo($user->email);
  }

  protected function userUpdatePassword($user)
  {
    return $this->actingAs($user)
      ->visit('/settings/password')
      ->type('RandomPasswordNew', 'password')
      ->type('RandomPasswordNew', 'password_confirmation')
      ->press('Update');
  }

}
