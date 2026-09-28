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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->boolean('cabelo')->default(false);
            $table->boolean('barba')->default(false);
            $table->boolean('cabelo_barba')->default(false);
            $table->decimal('vl_cabelo', 8, 2)->nullable();  
            $table->decimal('vl_barba', 8, 2)->nullable();
            $table->decimal('vl_cabelo_barba', 8, 2)->nullable();
            $table->timestamp('dt_criacao')->useCurrent();
            $table->timestamp('dt_atualizacao')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
