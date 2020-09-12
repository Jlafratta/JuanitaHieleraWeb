<?php

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();
        
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 0; $i < 2000; $i++) {
            Ticket::create([
                'idCompound' => 'W-'.($i+1),
                'date' => $faker->dateTime,
                'bruto' => $faker->numberBetween(500, 2500),
                'tara' => $faker->numberBetween(500, 2500),
                'neto' => $faker->numberBetween(1, 50),
                'total' => $faker->numberBetween(1, 50),
                'prodPrice' => $faker->numberBetween(1, 5),
                'client_name' => $faker->name,
                'patent' => $faker->postcode,
                'client_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
