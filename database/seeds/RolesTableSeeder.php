<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // limpio toda la data
        Role::truncate();

        Role::create([
            'name' => 'Empleado',
        ]);

        Role::create([
            'name' => 'Administrador',
        ]);
    }
}
