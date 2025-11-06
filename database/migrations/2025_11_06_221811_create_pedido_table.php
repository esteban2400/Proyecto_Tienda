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
        Schema::create('tbl_pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_pago');

            $table->dateTime('fecha_pedido')->useCurrent();
            $table->decimal('total', 10, 2);
            $table->string('estado', 50);
            $table->string('direccion_envio', 255)->nullable();
            $table->string('metodo_pago', 50)->nullable();

            $table->timestamps();

            
            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('tbl_usuarios')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_pago')
                ->references('id_pago')
                ->on('tbl_pagos')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pedidos');
    }
};
