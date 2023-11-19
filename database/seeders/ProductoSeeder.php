<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Coca-cola',
            'precio_unitario' => 20
        ]);

        Producto::create([
            'nombre' => 'Taco',
            'precio_unitario' => 20
        ]);

        Producto::create([
            'nombre' => 'Quesadilla',
            'precio_unitario' => 20
        ]);

        Producto::create([
            'nombre' => 'Vampiro',
            'precio_unitario' => 20
        ]);

        Producto::create([
            'nombre' => 'Fanta',
            'precio_unitario' => 20
        ]);
    }
}
