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
        Schema::create('ordenes_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->unsignedBigInteger('idOrden');
            $table->foreign('idOrden')->references('id')->on('ordenes');
            $table->smallInteger('precioUnitario');
            $table->smallInteger('cantidad');
            $table->smallInteger('descuento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_detalles');
    }
};
