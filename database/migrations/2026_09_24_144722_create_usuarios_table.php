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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo');
            $table->string('nome', 20);
            $table->string('sobrenome', 20);
            $table->string('email', 50)->unique();
            $table->string('senha', 60);
            $table->string('celular')->nullable();
            $table->date('dt_aniversario')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento', 100)->nullable();
            $table->integer('status');
            $table->timestamp('dt_criacao')->useCurrent();
            $table->timestamp('dt_atualizacao')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
