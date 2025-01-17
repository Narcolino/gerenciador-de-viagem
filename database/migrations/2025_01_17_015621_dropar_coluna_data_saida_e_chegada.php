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
        // dropar coluna data_saida e data_chegada
        Schema::table('viagens', function (Blueprint $table) {
            $table->dropColumn('data_saida');
            $table->dropColumn('data_chegada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //voltar coluna data_saida e data_chegada
        Schema::table('viagens', function (Blueprint $table) {
            $table->date('data_saida');
            $table->date('data_chegada');
        });
    }
};
