<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreatePeopleSeeder extends Seeder
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
                'name' => $faker->name,
                'forename' => $faker->firstName,
                'gender' => $faker->randomElement(['male', 'female', 'unknown']),
                'active' => $faker->randomElement([0, 1]),
                'active_from' => \Carbon\Carbon::now(),
                'active_to' => \Carbon\Carbon::now(),
                'created_by' => $faker->randomElement(['0', '1']),
                'updated_by' => $faker->randomElement(['0', '1']),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()

            ]);
        }


    }
}
