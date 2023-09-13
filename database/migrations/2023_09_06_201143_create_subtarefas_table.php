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
        Schema::create('subtarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('tarefa_id')->onDelete('CASCADE');
            $table->longText('descricao');
            $table->enum('status', ['pendente', 'completa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtarefas');
    }
};
