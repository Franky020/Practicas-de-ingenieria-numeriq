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
       Schema::create('materias', function (Blueprint $table) {
            $table->id('PK_Materia');
            $table->string('materia', 100);
            $table->text('descripcion')->nullable();
            $table->foreignId('FK_Nivel')->nullable()
                  ->constrained('niveles', 'PK_Nivel')
                  ->nullOnDelete();
            $table->foreignId('FK_Categoria')->nullable()
                  ->constrained('categorias', 'PK_Categoria')
                  ->nullOnDelete();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
