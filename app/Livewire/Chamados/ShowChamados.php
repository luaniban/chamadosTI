<?php

namespace App\Livewire\Chamados;

use App\Models\Chamado;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowChamados extends Component
{
    public $chamados;


    public function mount(){
        $this->chamados = Chamado::orderBy('created_at', 'desc')->get();
    }


    public function openChamado($chamado){

    }


    #[On('dispatch-chamado-feito')]
    public function render()
    {
        return view('livewire.chamados.show-chamados');
    }


}
