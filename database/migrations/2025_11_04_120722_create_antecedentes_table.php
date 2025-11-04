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
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('nutricionista_id')->constrained('personas')->onDelete('cascade');
            $table->date('fecha');
            $table->string('diagnostico')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->string('objetivo')->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->decimal('altura', 5, 2)->nullable();
            $table->decimal('imc', 5, 2)->nullable();
            $table->decimal('gc', 5, 2)->nullable();  // grasa corporal
            $table->decimal('mm', 5, 2)->nullable();  // masa muscular
            $table->date('fecha_prox_consulta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes');
    }
};
