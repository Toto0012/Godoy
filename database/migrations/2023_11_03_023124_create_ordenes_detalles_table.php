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
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->unsignedBigInteger('id_orden');
            $table->foreign('id_orden')->references('id')->on('ordenes');
            $table->smallInteger('platillo');
            $table->smallInteger('precio_unitario');
            $table->smallInteger('cantidad');
            $table->smallInteger('total');
            $table->string('descripcion');
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
