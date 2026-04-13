<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_familiar', 20)->unique();
            $table->string('nome_responsavel');
            $table->string('cpf_responsavel', 14)->nullable();
            $table->string('endereco');
            $table->string('numero', 20);
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade')->default('São Paulo');
            $table->string('cep', 9)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('numero_integrantes')->default(1);
            $table->boolean('possui_gestante')->default(false);
            $table->boolean('possui_idoso')->default(false);
            $table->boolean('possui_hipertenso')->default(false);
            $table->boolean('possui_diabetico')->default(false);
            $table->boolean('possui_crianca')->default(false);
            $table->text('observacoes')->nullable();
            $table->enum('risco', ['baixo', 'medio', 'alto'])->default('baixo');
            $table->foreignId('microarea_id')->constrained('microareas');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamp('ultima_visita')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('familias');
    }
};
