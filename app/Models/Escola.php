<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = 'escolas';



    public function chamados()
    {
        return $this->hasMany(Chamado::class, 'escola_id');
    }

}
