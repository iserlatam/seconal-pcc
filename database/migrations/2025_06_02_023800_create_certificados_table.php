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
        Schema::create('certificados', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nombre_completo')->nullable();
            $table->string('tipo_doc')->nullable()->default('false');
            $table->string('documento')->nullable();
            $table->dateTime('fecha_creacion')->nullable();
            $table->string('departamento')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('empresa')->nullable();
            $table->string('curso')->nullable();
            $table->string('codigo_certificado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
