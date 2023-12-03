<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Producto::Select('id','nombre','tipo')
        ->where('tipo','=',$request->tipo)
        ->get();
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Producto::create([
            'nombre' => $request->nombre,
            'precio_unitario' => $request->precio_unitario,
            'tipo' => $request->tipo
        ]);

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Producto::findOrFail($id);

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Producto::findOrFail($id);

        $data->update($request->all());

        return response()->json(['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Producto::findOrFail($id)->delete();

        return response()->json(['data eliminada' => $data]);
    }

    public function productoTipo(){
       $data = Producto::Select('tipo')->distinct()->get();
       return response()->json(['data' => $data]);
    }
}
