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

        User::create([
            'nombre' => 'Cristian Alejandro Romero Villalobos',
            'email' => 'tamalito@email.com',
            'password' => bcrypt('12345678'),
            'telefono' => "6671261616",
            'domicilio' => "Prados",
            'rol' => "Cocina",
            'id_sucursal' => 1
        ])->assignRole('Cocina');

        User::create([
            'nombre' => 'Hector Manuel Lara Ibarra',
            'email' => 'BT@email.com',
            'password' => bcrypt('12345678'),
            'telefono' => "6671261616",
            'domicilio' => "Prados",
            'rol' => "Mesero",
            'id_sucursal' => 1
        ])->assignRole('Mesero');
    
        User::create([
            'nombre' => 'Carlos Alejandro Cebreros',
            'email' => 'CarlosA@email.com',
            'password' => bcrypt('12345678'),
            'telefono' => "6671261616",
            'domicilio' => "Prados",
            'rol' => "Encargado",
            'id_sucursal' => 1
        ])->assignRole('Encargado');
    }
}
