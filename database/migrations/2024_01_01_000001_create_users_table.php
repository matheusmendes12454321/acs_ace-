<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf', 14)->unique();
            $table->string('password');
            $table->enum('funcao', ['administrador', 'acs', 'ace', 'enfermeiro', 'supervisor']);
            $table->foreignId('microarea_id')->nullable()->constrained('microareas')->nullOnDelete();
            $table->string('telefone', 20)->nullable();
            $table->string('coren', 20)->nullable();
            $table->boolean('ativo')->default(true);
            $table->timestamp('ultimo_acesso')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
