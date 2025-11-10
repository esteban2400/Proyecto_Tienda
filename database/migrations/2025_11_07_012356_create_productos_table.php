<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tblProductos', function (Blueprint $table) {
    $table->id('id_producto');    
    $table->string('nombre', 100);
    $table->decimal('precio', 10, 2);
    $table->unsignedBigInteger('id_categoria');
    $table->timestamps();

    $table->foreign('id_categoria')
        ->references('id_categoria')
        ->on('tblCategorias')
        ->onUpdate('cascade')
        ->onDelete('restrict');
});
    }

    public function down(): void
    {
        Schema::dropIfExists('Productos');
    }
};
