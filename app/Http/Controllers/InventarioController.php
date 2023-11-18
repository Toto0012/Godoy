<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventario::all();

        return response()->json(['data' => $data]);
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
        Inventario::findOrFail($id)->delete();

        return response()->json(['data' => 'Producto eliminado']);
    }
}

