<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tblCarrito', function (Blueprint $table) {
            $table->id('id_carrito');

            $table->unsignedBigInteger('id_usuario');

            $table->dateTime('fecha_creacion')->useCurrent();
            $table->string('estado', 50)->default('activo');

            $table->timestamps();


            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('tblUsuarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblCarrito');
    }
};
