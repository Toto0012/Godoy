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
        
    CREATE PROCEDURE get_cuenta @orden INT
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

    $procedure2 = "
    CREATE PROC get_ordenes_cocinero
    AS
    BEGIN
        SELECT p.nombre, od.mesa, od.platillo, od.cantidad, o.estatus, od.descripcion
        FROM ordenes_detalles od
        INNER JOIN ordenes o ON o.id = od.id_orden
        INNER JOIN productos p ON p.id = od.id_producto
        WHERE (o.estatus = 'Activo' OR o.estatus = 'Servido') AND p.nombre NOT LIKE '%Coca%' AND p.nombre NOT LIKE '%Agua%'
            AND CONVERT(DATE, o.fecha) = CONVERT(DATE, GETDATE());
    END
        "; 

        $procedure3 = "
    CREATE PROC get_ordenes_mesero
    AS
    BEGIN
        SELECT p.nombre, od.mesa, od.platillo, od.cantidad, o.estatus
        FROM ordenes_detalles od
        INNER JOIN ordenes o ON o.id = od.id_orden
        INNER JOIN productos p ON p.id = od.id_producto
        WHERE (o.estatus = 'Activo' OR o.estatus = 'Servido') AND CONVERT(DATE, o.fecha) = CONVERT(DATE, GETDATE());
    END
        "; 
        

        DB::unprepared($procedure);
        DB::unprepared($procedure2);
        DB::unprepared($procedure3);
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
        DB::unprepared('DROP PROCEDURE IF EXISTS get_ordenes_cocinero');
        DB::unprepared('DROP PROCEDURE IF EXISTS get_ordenes_mesero');
    }
}
