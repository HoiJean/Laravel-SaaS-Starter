<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

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

    protected function createUser()
    {
      $user = factory(App\User::class, 1)->create();

      \DB::table('role_user')->insert([
          'user_id' => $user->id,
          'role_id' => 1,
      ]);

      \DB::table('access_user')->insert([
          'user_id' => $user->id,
          'access_id' => 1,
      ]);

      return $user;
    }
}
