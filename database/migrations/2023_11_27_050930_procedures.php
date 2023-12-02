<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class procedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear procedimiento almacenado
        $procedure = "
        
    create PROCEDURE get_cuenta @orden INT
    AS
    BEGIN
        DECLARE @suma_total MONEY;

        SELECT @suma_total = SUM(od.total)
        FROM ordenes_detalles od
        WHERE od.id_orden = @orden;

        SELECT od.id_orden, od.id_producto, p.nombre, od.cantidad, od.total AS precio, @suma_total AS total
        FROM ordenes_detalles od
        INNER JOIN productos p ON od.id_producto = p.id
        WHERE od.id_orden = @orden;
    END

    
        ";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimina el procedimiento almacenado si es necesario
        DB::unprepared('DROP PROCEDURE IF EXISTS get_cuenta');
    }
}
