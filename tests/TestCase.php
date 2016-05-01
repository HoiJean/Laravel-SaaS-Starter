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

    protected function createUser($type = 'free')
    {
      $settings = [
        'free' => [
          'role_id' => 1,
          'access_id' => 1,
        ],
        'standard' => [
          'role_id' => 1,
          'access_id' => 2,
        ],
        'premium' => [
          'role_id' => 1,
          'access_id' => 3,
        ],
        'gold' => [
          'role_id' => 1,
          'access_id' => 4,
        ],
        'admin' => [
          'role_id' => 2,
          'access_id' => 1,
        ],
      ];

      $user = factory(App\User::class, 1)->create();

      \DB::table('role_user')->insert([
          'user_id' => $user->id,
          'role_id' => $settings[$type]['role_id'],
      ]);

      \DB::table('access_user')->insert([
          'user_id' => $user->id,
          'access_id' => $settings[$type]['access_id'],
      ]);

      return $user;
    }
}
