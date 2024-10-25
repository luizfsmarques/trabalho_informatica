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
        Schema::create('cliente_produto', function (Blueprint $table) {
            $table->foreignId('codCli')->nullable()->references('codCli')->on('clientes')->onDelete('cascade');
            $table->foreignId('codProd')->nullable()->references('codProd')->on('produtos')->onDelete('cascade');
            $table->date('data');
            $table->time('hora');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_produto');
    }
};
