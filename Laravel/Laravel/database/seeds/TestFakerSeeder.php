<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class TestFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\TestFaker');
        for ($i = 0; $i < 10; $i++) {
            DB::table('test_fakers')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->date('Y-m-d H:i:s'),
                'password' => $faker->password,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()

            ]);
        }

    }
}
