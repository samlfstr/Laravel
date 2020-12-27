<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\TestPerson');


        for ($i = 0; $i < 10; $i++) {

                  DB::table('test_people')->insert([
                      'username' => $faker->userName,
                      'password' => $faker->password,
                      'status' => $faker->randomElement([0, 1]),
                      'created_by' => $faker->randomElement(['0', '1']),
                      'updated_by' => $faker->randomElement(['0', '1']),
                      'created_at' => \Carbon\Carbon::now(),
                      'updated_at' => \Carbon\Carbon::now()
                  ]);
              }



    }
}
