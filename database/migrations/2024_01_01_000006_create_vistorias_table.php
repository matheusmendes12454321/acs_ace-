<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vistorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->nullable()->constrained('focos_endemias');
            $table->string('endereco');
            $table->string('bairro');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->date('data_vistoria');
            $table->enum('resultado', ['foco_encontrado', 'sem_foco', 'pendente', 'eliminado']);
            $table->text('descricao')->nullable();
            $table->string('foto_path')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->text('acoes_realizadas')->nullable();
            $table->boolean('sincronizado')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vistorias');
    }
};
