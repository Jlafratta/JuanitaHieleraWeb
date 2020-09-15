<?php

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // limpiamos la data
        // ejecuto estos statements para poder el truncate en la tabla vinculada a fk's
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Client::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 0; $i < 80; $i++) {
            Client::create([
                'name' => $faker->name,
                'address' => $faker->streetAddress,
                'phoneline' => $faker->e164PhoneNumber,
                'debtor' => 0,
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            Client::create([
                'name' => $faker->name,
                'address' => $faker->streetAddress,
                'phoneline' => $faker->e164PhoneNumber,
                'debtor' => 1,
            ]);
        }
    }
}
