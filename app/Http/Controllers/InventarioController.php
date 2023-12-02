<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Inventario::select('id','nombre','habia','entro','quedo','gasto','precio')
        ->where('fecha','=',$request->fecha)->get();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Inventario::create([
            'nombre' => $request->nombre,
            'habia' => $request->habia,
            'entro' => $request->entro,
            'quedo' => $request->quedo,
            'gasto' => $request->gasto,
            'precio' => $request->precio,
            'fecha' => $request->fecha,
            'sucursal_id' => $request->sucursal_id,
        ]);

        return response()->json(['data:' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Inventario::findOrFail($id);
        return response()->json(['data: ' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Inventario::findOrFail($id);       
        $data->update([
            'habia' => $request['habia'],
            'entro' => $request['entro'],
            'quedo' => $request['quedo'],
            'precio' => $request['precio']
            
        ]);
        $data = Inventario::findOrFail($id);
        $gasto = $data['habia'] + $data['entro'] - $data['quedo'];
        $data->update([
            'gasto' => $gasto         
        ]);
        return response()->json(['mensaje' => 'Datos actualizados con exito']);
        //return response()->json(['data' => $data]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Inventario::findOrFail($id)->delete();

        return response()->json(['data eliminada' => $data]);
    }

    public function nuevoInventario(Request $request){
        $fechaActual = $request->fecha;
        $data = Inventario::select('nombre','quedo','sucursal_id','precio')->where('fecha','=',$fechaActual)->get();
        $fechaActual = Carbon::parse($fechaActual);
        $fechaSiguiente = $fechaActual->addDay();
        $fechaSiguiente = $fechaSiguiente->format('Y-m-d');
        foreach ($data as $dato) {
        Inventario::create([
            'nombre' => $dato->nombre,
            'habia' => $dato->quedo,
            'entro' => 0.0,
            'quedo' => 0.0,
            'gasto' => 0.0,
            'precio' => $dato->precio,
            'fecha' => $fechaSiguiente,
            'sucursal_id' => $dato->sucursal_id,
        ]);
    }
        return response()->json(['mensaje:' => 'Inventario Finalizado']);

    }
}

