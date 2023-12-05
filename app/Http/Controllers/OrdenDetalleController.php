<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenDetalleRequest;
use App\Models\Orden;
use App\Models\OrdenDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(OrdenDetalleRequest $request)
    {
        $json = $request->json()->all();

        $ordenes = $json['ordenes'];

        foreach ($ordenes as $orden) {
            $data[] = OrdenDetalle::create([
                "id_producto" => $orden['id_producto'],
                "id_orden" => $orden['id_orden'],
                "mesa" => $orden['mesa'],
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

    public function get_cuenta(Request $request){

        $dataO = Orden::findOrFail($request->orden);
        
        $data = DB::select('EXEC get_cuenta ?', [$request->orden]);

        $dataO->update(['estatus' => "Terminado"]);
        
        return response()->json(['data:' => $data]);


    }

    public function get_ordenes_cocinero(){
        
        $data = DB::select('EXEC get_ordenes_cocinero');
        
        return response()->json(['data:' => $data]);
    }

    public function get_ordenes_mesero(){
        
        $data = DB::select('EXEC get_ordenes_mesero');
        
        return response()->json(['data:' => $data]);
    }

    public function servido(string $id){
        
        $data = Orden::findOrFail($id);

        $data->update(['estatus' => "Servido"]);

        return response()->json(['data:' => $data]);
    }
}
