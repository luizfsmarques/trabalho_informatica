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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('codCli');
            $table->string('nome',250);
            $table->string('cpf',14);
            $table->string('idade',3);
            $table->string('profissao',250);
            $table->string('quantFamiliares',250);
            $table->string('bairro',250);
            $table->string('rua',250);
            $table->string('numero',250);
            $table->string('complemento',250);
            $table->string('cidade',250);
            $table->string('cep',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
