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
          'id' => 1,
          'name' => 'free'
      ]);

      DB::table('accesses')->insert([
          'id' => 2,
          'name' => 'standard'
      ]);

      DB::table('accesses')->insert([
          'id' => 3,
          'name' => 'premium'
      ]);

      DB::table('accesses')->insert([
          'id' => 4,
          'name' => 'gold'
      ]);
    }
}
