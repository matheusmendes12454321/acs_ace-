<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained('families')->cascadeOnDelete();
            $table->string('full_name');
            $table->date('birth_date');
            $table->enum('gender', ['M', 'F']);
            $table->string('cpf')->nullable();
            $table->string('sus_card')->nullable();
            $table->json('risk_groups')->nullable(); // ['pregnant', 'elderly', 'chronic_disease', 'disabled', 'hypertension', 'diabetes']
            $table->text('health_conditions')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};