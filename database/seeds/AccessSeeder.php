<?php

use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('accesses')->insert([
          'name' => 'free'
      ]);

      DB::table('accesses')->insert([
          'name' => 'standard'
      ]);

      DB::table('accesses')->insert([
          'name' => 'premium'
      ]);

      DB::table('accesses')->insert([
          'name' => 'gold'
      ]);
    }
}
