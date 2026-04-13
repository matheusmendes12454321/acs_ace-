<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focos_endemias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_foco', 20)->unique();
            $table->string('endereco');
            $table->string('numero', 20);
            $table->string('bairro');
            $table->string('cidade')->default('São Paulo');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->enum('tipo', ['dengue', 'zika', 'chikungunya', 'outros']);
            $table->enum('risco', ['baixo', 'medio', 'alto', 'critico']);
            $table->enum('status', ['identificado', 'em_tratamento', 'eliminado', 'monitorado']);
            $table->text('descricao')->nullable();
            $table->string('foto_path')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->date('data_identificacao');
            $table->date('data_eliminacao')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focos_endemias');
    }
};
