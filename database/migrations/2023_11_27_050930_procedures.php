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
        CREATE PROCEDURE get_inventario
        @FechaConsulta DATE
    AS
    BEGIN
        SELECT *
        FROM inventarios
        WHERE CONVERT(DATE, Fecha) = @FechaConsulta;
    END;
    
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
        DB::unprepared('DROP PROCEDURE IF EXISTS get_inventario');
    }
}
