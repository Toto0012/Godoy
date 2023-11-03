<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('idSucursal')->after('id');
            $table->foreign('idSucursal')->references('id')->on('sucursales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_idSucursal_foreign'); // Elimina la restricción de llave foránea
            $table->dropColumn('idSucursal'); // Elimina la columna          
        });
    }
};
