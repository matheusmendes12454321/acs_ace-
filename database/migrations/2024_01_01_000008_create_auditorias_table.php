<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visita_id')->constrained('visitas');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['aprovado', 'reprovado', 'pendente', 'revisao']);
            $table->text('observacoes')->nullable();
            $table->boolean('geolocalizacao_ok')->default(false);
            $table->boolean('biometria_ok')->default(false);
            $table->boolean('documentacao_ok')->default(false);
            $table->text('divergencias')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
