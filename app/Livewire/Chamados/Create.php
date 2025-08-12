<?php

namespace App\Livewire\Chamados;

use App\Models\Chamado;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Create extends Component
{

    use Interactions;


    public $escolas;

    public $titulo;
    public $descricao;
    public $escola_id;
    public $categoria;
    public $urgencia;





    public function store(){

        $this->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'escola_id' => 'required',
            'categoria' => 'required',
            'urgencia' => 'required',
        ]);

        Chamado::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'categoria' => $this->categoria,
            'escola_id' => 1,
            'urgencia' => $this->urgencia,
            'status' => "Em Andamento",
            'solicitante_id' => auth()->user()->id
        ]);

        $this->toast()->success('Chamado criado com sucesso!')->send();

    }


    public function mount(){
        $this->escolas = \App\Models\Escola::all();
    }



    public function render()
    {
        return view('livewire.chamados.create');
    }
}
