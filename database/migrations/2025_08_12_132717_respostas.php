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
        Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chamado_id')->constrained('chamados')->cascadeOnDelete();
            $table->foreignId('responsavel_id')->constrained('users')->cascadeOnDelete();
            $table->longText('resposta');
            $table->string('anexo')->nullable();
            $table->boolean('notificar_solicitante')->default(false);
            $table->string('nota_interna')->nullable();
            $table->string('tempo_gasto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
