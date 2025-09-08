<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'categoria',
        'escola_id',
        'urgencia',
        'status',
        'solicitante_id',
    ];

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'solicitante_id');
    }

    public function resposta()
    {
        return $this->hasOne(Resposta::class);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
}
