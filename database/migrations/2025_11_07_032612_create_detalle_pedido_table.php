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
        Schema::create('tbl_detalle_pedido', function (Blueprint $table) {
            $table->id('id_detalle_pedido');

            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_personalizacion')->nullable();

            $table->integer('cantidad')->default(1);
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);

            $table->timestamps();

            // Relaciones (claves foráneas)
            // $table->foreign('id_pedido')
            //     ->references('id_pedido')
            //     ->on('tbl_pedidos')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // $table->foreign('id_producto')
            //     ->references('id_producto')
            //     ->on('tbl_productos')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');

            // $table->foreign('id_personalizacion')
            //     ->references('id_personalizacion')
            //     ->on('tbl_personalizaciones')
            //     ->onUpdate('cascade')
            //     ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_detalle_pedido');
    }
};