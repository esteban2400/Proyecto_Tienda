<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->string('talla', 10);
            $table->decimal('precio', 8, 2);
            $table->string('color', 50);
            $table->integer('stock');

            $table->foreignId('id_marca')
                  ->constrained('marca');


            $table->foreignId('id_categoria')
                  ->constrained('categoria');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
