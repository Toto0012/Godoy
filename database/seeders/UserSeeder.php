<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Alexander Duarte Garcia',
            'email' => 'toto_300_toto@hotmail.com',
            'password' => bcrypt('12345678'),
            'telefono' => "6671261616",
            'domicilio' => "Prados",
            'rol' => "Admin",
            'id_sucursal' => 1
        ])->assignRole('Admin');

    }
}
