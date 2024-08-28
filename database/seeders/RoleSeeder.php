<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         /*
       Admin => control total
       Doctor => ver pacientes, citas, historiales, trataminetos
       Secretaria => ver citas, 
       Paciente => ver su citas
     */

     $admin = Role::create(['name' => 'admin']);
     $doctor = Role::create(['name' => 'doctor']);
     $secretaria = Role::create(['name' => 'secretaria']);
     $paciente = Role::create(['name' => 'paciente']);

    //Permission::create('name'=> '')
    }
}