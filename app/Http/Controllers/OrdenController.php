<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Orden::all();

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Orden::create([
            "id_usuario" => $request->id_usuario,
            "fecha" => $request->fecha,
            "estatus" => $request->estatus,
            "mesa" => $request->mesa,
        ]);

        return response()->json(['data' => $data]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Orden::findOrFail($id);

        return response()->json(['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Orden::findOrFail($id);

        $data->update($request->all());

        return response()->json(['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Orden::findOrFail($id)->delete();

        return response()->json(['data' => $data]);
    }
}
