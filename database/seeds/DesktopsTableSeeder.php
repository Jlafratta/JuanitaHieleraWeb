<?php

use App\Models\Desktop;
use Illuminate\Database\Seeder;

class DesktopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpio toda la data que haya
        Desktop::truncate();

        Desktop::create([
            'id' => 1,
            'api_key' => '5yZqnIF5khDra2Kd79E1UdTiTagz8B3ZsS8otpGhIuxveFhbMcJZWjNXfRPj',
        ]);
    }
}
