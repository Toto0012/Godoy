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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->char('nombre',35);
            $table->decimal('habia',7,2);
            $table->decimal('entro',7,2);
            $table->decimal('quedo',7,2);
            $table->decimal('gasto',7,2);
            $table->decimal('precio',6,2);
            $table->date('fecha');
            $table->unsignedBigInteger('idSucursal');
            $table->foreign('idSucursal')->references('id')->on('sucursales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
