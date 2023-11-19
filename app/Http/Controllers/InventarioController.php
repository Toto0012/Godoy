<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = DB::select('EXEC get_inventario');

        return response()->json(['data' => $registros]);
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

        $data->update($request->all());

        return response()->json(['data' => $data]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Inventario::findOrFail($id)->delete();

        return response()->json(['data eliminada' => $data]);
    }
}

