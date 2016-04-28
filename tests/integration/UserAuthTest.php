<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAuthTest extends TestCase
{

  use DatabaseTransactions;

  // public function setup(){
  //   parent::setUp();
  //
  //   Mail::getSwiftMailer()
  //     ->registerPlugin(new TestingMailEventListener($this));
  // }

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

  /** @test */
  public function when_user_logs_in_they_are_redirected_to_the_dashboard()
  {
    $user = App\User::create([
        'name' => 'Taylor',
        'email' => 'taylor@example.com',
        'password' => Hash::make('RandomPassword'),
    ]);

    $this->visit('/login')
        ->type('taylor@example.com', 'email')
        ->type('RandomPassword', 'password')
        ->press('Login')
        ->seePageIs('/dashboard');
  }


  /** @test */
  public function when_user_registers_they_are_redirected_to_the_dashboard()
  {
    $this->visit('/register')
        ->type('Taylor', 'name')
        ->type('taylor@example.com', 'email')
        ->type('RandomPassword', 'password')
        ->type('RandomPassword', 'password_confirmation')
        ->press('Register')
        ->seePageIs('/dashboard');
  }

  /** @test */
  public function can_access_forgot_reset_from_login_screen()
  {
    $this->visit('/login')
        ->click('Forgot Your Password?')
        ->seePageIs('/password/reset');
  }

  // /** @test */
  // public function see_email_was_sent_after_guest_request_password_request()
  // {
  //   // $user = factory(App\User::class, 1)->create();
  //   // $this->visit('/password/reset')
  //   //     ->type($user->email, 'email')
  //   //     ->press('Send Password Reset Link')
  //   //     ->seeEmailWasSent();
  //
  //   Mail::raw('Hello World', function($message){
  //     $message->to('foo@bar.com');
  //     $message->from('bar@foo.com');
  //   });
  //
  //
  //   // $this->seeEmailWasSent();
  //
  //
  //
  // }
  //
  // protected function seeEmailWasSent(){
  //   Mail::raw('Hello World', function($message){
  //     $message->to('foo@bar.com');
  //     $message->from('bar@foo.com');
  //   });
  // }
}

//
// class TestingMailEventListener implements Swift_Events_EventListener
// {
//   public function beforeSendPerformed($event)
//   {
//     $message = $event->getMessage();
//
//     // dd($message);
//   }
// }
