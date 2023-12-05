<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sucursal::create([
            'nombre' => 'Taqueria Él Primo De Guamúchil',
            'direccion' => 'Blvd. Alfonso G. Calderón Velarde #sn local 7 desarrollo urbano 3 ríos, Congreso del Estado, 80020 Culiacán Rosales, Sin.',
            'telefono' => '+526672346795'          
        ]);

        Sucursal::create([
            'nombre' => 'Taqueria Él Primo De Guamúchil',
            'direccion' => 'Los mochis',
            'telefono' => '+6671272526'          
        ]);
    }
}
