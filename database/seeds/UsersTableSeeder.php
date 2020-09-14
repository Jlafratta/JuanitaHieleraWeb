<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // limpio toda la data de usuarios
        User::truncate();

        $pass = Hash::make('123123123');

        User::create([
            'name' => 'Roy Jones',
            'email' => 'employee@hielera.com',
            'password' => $pass,
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Mike Tyson',
            'email' => 'admin@hielera.com',
            'password' => $pass,
            'role_id' => 2,
        ]);
    }
}
