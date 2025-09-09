<?php

namespace App\Livewire;

use App\Models\Chamado;
use Livewire\Component;

class Index extends Component
{
    public $urgenciaBaixa;
    public $urgenciaMedia;
    public $urgenciaAlta;

    public $chamadosAbertos;
    public $chamadosEncerrados;
    public $chamadosConcluidos;
    public $chamadosEmAtendimento;


    public function mount(){
        $this->urgenciaBaixa = Chamado::where('urgencia', 'Baixa')->count();
        $this->urgenciaMedia = Chamado::where('urgencia', 'Média')->count();
        $this->urgenciaAlta = Chamado::where('urgencia', 'Alta')->count();

        $this->chamadosAbertos = Chamado::where('status', 'Em Andamento')->count();
        $this->chamadosEncerrados = Chamado::where('status', 'Fechado')->count();
        $this->chamadosConcluidos = Chamado::where('status', 'Resolvido')->count();
        $this->chamadosEmAtendimento = Chamado::where('status', 'Em analise')->count();

    }
    public function render()
    {
        return view('livewire.index');
    }
}
