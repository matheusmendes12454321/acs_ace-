<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('microareas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->text('poligono_coordenadas')->nullable();
            $table->integer('populacao_estimada')->default(0);
            $table->integer('residencias_estimadas')->default(0);
            $table->decimal('cobertura_percentual', 5, 2)->default(0);
            $table->enum('status', ['ativo', 'inativo', 'pendente'])->default('ativo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('microareas');
    }
};
