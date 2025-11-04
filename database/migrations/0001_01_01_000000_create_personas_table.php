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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("ci")->nullable();
            $table->string('nombre');
            $table->string('telefono');
            $table->enum('sexo', ['F', 'M']);
            $table->date("nacimiento");
            $table->enum('tipo', ["ADMINISTRATIVO", "NUTRICIONISTA", "INSTRUCTOR","CLIENTE"]);
            $table->string("especialidad")->nullable();
            $table->string("cargo")->nullable();
            $table->enum("turno", ["MAÑANA", "TARDE", "NOCHE"])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
