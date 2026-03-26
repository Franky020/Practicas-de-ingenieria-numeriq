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
        Schema::create('tema_materia', function (Blueprint $table) {
            $table->id('PK_TemaMateria');

            $table->unsignedBigInteger('FK_Tema');
            $table->unsignedBigInteger('FK_Materia');

            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('FK_Tema')
                  ->references('PK_Tema')
                  ->on('temas')
                  ->onDelete('cascade');

            $table->foreign('FK_Materia')
                  ->references('PK_Materia')
                  ->on('materias')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tema_materia');
    }
};
