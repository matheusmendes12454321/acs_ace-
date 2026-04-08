<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained('families');
            $table->foreignId('agent_id')->constrained('users');
            $table->date('visit_date');
            $table->enum('result', ['realizada', 'recusada', 'ausente', 'fechada']);
            $table->text('reason')->nullable();
            $table->text('observations')->nullable();
            $table->json('actions_taken')->nullable();
            $table->json('symptoms')->nullable();
            $table->boolean('is_offline')->default(false);
            $table->timestamp('synced_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};