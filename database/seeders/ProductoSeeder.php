<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Taco De Maíz', 'precio_unitario' => 50, 'tipo' => 'Taco'],
            ['nombre' => 'Taco De Harina', 'precio_unitario' => 55, 'tipo' => 'Taco'],
            ['nombre' => 'Mixta De Maíz', 'precio_unitario' => 90, 'tipo' => 'Mixta'],
            ['nombre' => 'Mixta De Harina', 'precio_unitario' => 90, 'tipo' => 'Mixta'],
            ['nombre' => 'MixtaPlana De Maíz', 'precio_unitario' => 120, 'tipo' => 'MixtaPlana'],
            ['nombre' => 'MixtaPlana De Harina', 'precio_unitario' => 120, 'tipo' => 'MixtaPlana'],
            ['nombre' => 'Vampiro', 'precio_unitario' => 90, 'tipo' => 'Vampiro'],
            ['nombre' => 'Pellizcada', 'precio_unitario' => 100, 'tipo' => 'Pellizcada'],
            ['nombre' => 'Papa Asada', 'precio_unitario' => 170, 'tipo' => 'Papa Asada'],
            //['nombre' => 'Orden De Carne Asada', 'precio_unitario' => 220, 'tipo' => ''],
            ['nombre' => 'Tripa', 'precio_unitario' => 5, 'tipo' => 'Complemento'],
            ['nombre' => 'Mixto', 'precio_unitario' => 5, 'tipo' => 'Complemento'],
            ['nombre' => 'Coca De 600 Normal', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 Light', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 Sin Azucar', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 De Naranja', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 De Sidral', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 De Fresa', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 De Fresca', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Coca De 600 De Sprite', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Valle Frut De 600', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Mineral ', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Sangria De 600', 'precio_unitario' => 30, 'tipo' => 'Coca De 600'],
            ['nombre' => 'Agua Natural De 1/2', 'precio_unitario' => 15, 'tipo' => 'Agua Natural'],
            ['nombre' => 'Agua Natural De 1 Litro', 'precio_unitario' => 20, 'tipo' => 'Agua Natural'],
            ['nombre' => 'Coca De Vidrio Normal', 'precio_unitario' => 30, 'tipo' => 'Coca De Vidrio'],
            ['nombre' => 'Coca De Vidrio De Naranja', 'precio_unitario' => 30, 'tipo' => 'Coca De Vidrio'],
            ['nombre' => 'Coca De Vidrio De Sidral', 'precio_unitario' => 30, 'tipo' => 'Coca De Vidrio'],
            ['nombre' => 'Coca De Vidrio De Sprite', 'precio_unitario' => 30, 'tipo' => 'Coca De Vidrio'],
            ['nombre' => 'Coca De Vidrio De Fresca', 'precio_unitario' => 30, 'tipo' => 'Coca De Vidrio'],
            ['nombre' => 'Coca De Vidrio De Fresa', 'precio_unitario' => 30, 'tipo' => 'Coca De Vidrio'],
            ['nombre' => 'Agua De Sabor De 1 Litro De Jamaica', 'precio_unitario' => 40, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1 Litro De Horchata', 'precio_unitario' => 40, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1 Litro De Piña', 'precio_unitario' => 40, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1 Litro De Tamarindo', 'precio_unitario' => 40, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1 Litro De Cebada', 'precio_unitario' => 40, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1/2 De Jamaica', 'precio_unitario' => 30, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1/2 Litro De Horchata', 'precio_unitario' => 30, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1/2 Litro De Piña', 'precio_unitario' => 30, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1/2 Litro De Tamarindo', 'precio_unitario' => 30, 'tipo' => 'Agua De Sabor'],
            ['nombre' => 'Agua De Sabor De 1/2 Litro De Cebada', 'precio_unitario' => 30, 'tipo' => 'Agua De Sabor']      
        ];

        foreach($productos as $producto){
            Producto::create($producto);
        }      
    }
}
