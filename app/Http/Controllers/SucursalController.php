<?php

namespace App\Http\Controllers;

use App\Http\Requests\SucursalRequest;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sucursal::all();

        return response()->json(['Sucursal' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SucursalRequest $request)
    {
        $data = Sucursal::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);

        return response()->json(['Sucursal:' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sucursal::findOrFail($id);
        return response()->json(['Sucursal: ' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SucursalRequest $request, string $id)
    {
        $data = Sucursal::findOrFail($id);

        $data->update($request->all());

        return response()->json(['Sucursal' => $data]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sucursal::findOrFail($id)->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
