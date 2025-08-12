<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'chamado_id',
        'responsavel_id',
        'resposta',
        'anexo',
        'notificar_solicitante',
        'nota_interna',
        'tempo_gasto',
    ];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}
