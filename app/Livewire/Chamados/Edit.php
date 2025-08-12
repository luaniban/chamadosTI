<?php

namespace App\Livewire\Chamados;

use App\Models\Chamado;
use Livewire\Component;
use Livewire\Attributes\On;

class Edit extends Component
{
   

    public function render()
    {
        return view('livewire.chamados.edit');
    }
}
