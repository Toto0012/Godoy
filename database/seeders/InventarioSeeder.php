<?php

namespace Database\Seeders;

use App\Models\Inventario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventario::create([
            'nombre' => "Fanta de fresa",
            'habia' => "1",
            'entro' => "2",
            'quedo' => "3",
            'gasto' => "120",
            'precio' => "20",
            'fecha' => "2023-17-11",
            'sucursal_id' => 1,
        ]);
    }
}
