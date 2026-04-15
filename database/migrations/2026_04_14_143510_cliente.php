<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Função para criar os campos da tabela clientes
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
        
            $table->id();
            $table->string('nome', 150);
            $table->date('data_nascimento');
            $table->string('cep', 8);
            $table->string('endereco', 100);
            $table->string('numero', 10);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
