<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        
         if (!Schema::hasTable('tblPersonalizaciones')) {

    Schema::create('tblPersonalizaciones', function (Blueprint $table) {
            $table->id('id_personalizacion');
            
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_usuario');
            
            $table->string('tipo', 100);
            $table->string('tamaño', 50);
            $table->decimal('precio_extra', 10, 2)->default(0);
            $table->string('diseño', 255)->nullable();
            $table->decimal('precio_total_personalizacion', 10, 2)->nullable();

            $table->timestamps();


            $table->foreign('id_producto')
                ->references('id_producto')
                ->on('tblProductos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('tblUsuarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    } 
    }

    public function down(): void
    {
        Schema::dropIfExists('tblPersonalizaciones');
    }
    };
    
    
