<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\Sucursal;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fecha = Carbon::now();
        $fechaModificada = $fecha->format('Y-m-d');
        
        $nombres = [
            'AGUACATE',
            'TOMATE',
            'CEBOLLA BLANCA',
            'CEBOLLA MORADA',
            'CHILE JALAPEÑO',
            'CHILE SERRANO',
            'CILANTRO',
            'CHILE HABANERO',
            'LECHUGA',
            'LIMON',
            'PEPINO',
            'RABANO',
            'REFRESCO DE 600',
            'REFRESCO DE VIDRIO',
            'AGUAS DE SABOR DE 1/2 LITRO',
            'AGUAS DE SABOR DE 1 LITRO',
            'AGUA NATURAL 1/2 LITRO',
            'AGUA NATURAL 1 LITRO',
            'RES',
            'TRIPA',
            'QUESO',
            'TORTILLA MAIZ',
            'TORTILLA HARINA',
            'PELLIZCADA',
            'PAPA',
            'RIÑONADA',
            'SALCHICHA',
            'CARBON',
            'ROJA',
            'TATEMADA',
            'COLOMBIANA',
            'MEXICANA'
        ];
    $sucursales = Sucursal::select('id')->get();
        foreach ($nombres as $nombre) {
            foreach ($sucursales as $sucursal) {
            Inventario::create([
                'nombre' => $nombre,
                'habia' => 0,
                'entro' => 0,
                'quedo' => 0,
                'gasto' => 0,
                'precio' => 0,
                'fecha' => $fechaModificada,   
                'sucursal_id' => $sucursal->id                
            ]);
    }
    }}
}
