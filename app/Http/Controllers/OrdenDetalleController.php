<?php

namespace App\Http\Controllers;

use App\Models\OrdenDetalle;
use Illuminate\Http\Request;

class OrdenDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = OrdenDetalle::all();

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $json = $request->json()->all();

        $ordenes = $json['ordenes'];

        foreach ($ordenes as $orden) {
            $data[] = OrdenDetalle::create([
                "id_producto" => $orden['id_producto'],
                "id_orden" => $orden['id_orden'],
                "platillo" => $orden['platillo'],
                "precio_unitario" => $orden['precio_unitario'],
                "cantidad" => $orden['cantidad'],
                "total" => ($orden['cantidad'] * $orden['precio_unitario']),
                "descripcion" => $orden['descripcion'],
            ]);
        }

        return response()->json(['data' => $data]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = OrdenDetalle::findOrFail($id);

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = OrdenDetalle::findOrFail($id);

        $data->update($request->all());

        return response()->json(['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = OrdenDetalle::findOrFail($id)->delete();

        return response()->json(['data' => $data]);
    }
}
