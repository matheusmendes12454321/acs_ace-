<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sincronizacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('tabela');
            $table->string('registro_id');
            $table->enum('operacao', ['create', 'update', 'delete']);
            $table->json('dados')->nullable();
            $table->enum('status', ['pendente', 'sincronizado', 'erro']);
            $table->text('erro_mensagem')->nullable();
            $table->integer('tentativas')->default(0);
            $table->timestamp('sincronizado_em')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sincronizacoes');
    }
};
