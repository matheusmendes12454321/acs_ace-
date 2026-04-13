<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('tipo', ['emergencia', 'urgencia', 'monitoramento', 'informativo']);
            $table->enum('prioridade', ['alta', 'media', 'baixa']);
            $table->enum('status', ['ativo', 'em_atendimento', 'resolvido', 'cancelado']);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('familia_id')->nullable()->constrained('familias');
            $table->foreignId('foco_id')->nullable()->constrained('focos_endemias');
            $table->string('endereco')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->foreignId('responsavel_id')->nullable()->constrained('users');
            $table->timestamp('resolvido_em')->nullable();
            $table->text('solucao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};
