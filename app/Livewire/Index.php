<?php

namespace App\Livewire;

use App\Models\Chamado;
use Livewire\Component;

class Index extends Component
{
    public $urgenciaBaixa;
    public $urgenciaMedia;
    public $urgenciaAlta;




    public function mount(){
        $this->urgenciaBaixa = Chamado::where('urgencia', 'Baixa')->count();
        $this->urgenciaMedia = Chamado::where('urgencia', 'Média')->count();
        $this->urgenciaAlta = Chamado::where('urgencia', 'Alta')->count();

    }
    public function render()
    {
        return view('livewire.index');
    }
}
