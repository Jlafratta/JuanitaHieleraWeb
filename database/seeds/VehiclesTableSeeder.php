<?php

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::truncate();
        
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 0; $i < 20; $i++) {
            Vehicle::create([
                'patent' => $faker->postcode,
                'tara' => $faker->numberBetween(500, 2500),
                'model' => $faker->word,
                'client_name' => $faker->name,
                'client_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
