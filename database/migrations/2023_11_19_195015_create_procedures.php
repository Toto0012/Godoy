<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProcedures extends Migration
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
            AS
            BEGIN
                SELECT nombre, habia, precio, CONVERT(DATE, fecha) AS fecha
                FROM inventarios
                WHERE CONVERT(DATE, fecha) = CONVERT(DATE, GETDATE());
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
        DB::unprepared('DROP PROCEDURE IF EXISTS get_inventario');
    }
}
