<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('familia_id')->constrained('familias');
            $table->foreignId('user_id')->constrained('users');
            $table->date('data_visita');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fim')->nullable();
            $table->enum('status', ['realizada', 'recusada', 'ausente', 'agendada', 'remarcada']);
            $table->enum('tipo', ['rotina', 'emergencia', 'acompanhamento', 'cadastro']);
            $table->text('observacoes')->nullable();
            $table->string('pressao_arterial', 20)->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->decimal('temperatura', 4, 1)->nullable();
            $table->boolean('medicacao_entregue')->default(false);
            $table->boolean('vacina_atualizada')->default(false);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('sincronizado')->default(false);
            $table->timestamp('sincronizado_em')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
