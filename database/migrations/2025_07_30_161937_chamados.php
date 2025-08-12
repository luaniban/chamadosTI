<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->text('descricao');
            $table->string('categoria');
            $table->unsignedBigInteger('escola_id');

            $table->enum('urgencia', ['Baixa', 'Media', 'Alta']);
            $table->enum('status', ['Aberto', 'Em analise', 'Em andamento', 'Aguardando usuario', 'Resolvido', 'Fechado'])
                  ->default('Aberto');

            $table->foreignId('solicitante_id')->constrained('users')->cascadeOnDelete();

            $table->timestamps();

            // Se quiser FK para escolas, adicione assim:
            // $table->foreign('escola_id')->references('id')->on('escolas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
