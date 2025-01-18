<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motorista_viagem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motorista_id')->constrained('motorista');
            $table->foreignId('viagem_id')->constrained('viagens');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorista_viagem');
    }
};
