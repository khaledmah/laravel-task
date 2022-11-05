<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Section2;
class Section1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            Section2::create([
                'Name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'Birthdate' => $faker->dateTime(),
            ]);
        }
    }
}
