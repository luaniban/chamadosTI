<?php

namespace App\Livewire;

use App\Models\Chamado;
use Livewire\Component;

class ShowRespostaForUser extends Component
{

    public $chamados;
    public $respostas;


    public function dispatchShowResponse($id){
        $this->dispatch('dispatch-open-resposta', $id);
    }


    public function mount(){
        $user = auth()->user();
        $this->chamados = Chamado::where('solicitante_id', $user->id)->get();

    }

    public function render()
    {
        return view('livewire.show-resposta-for-user');
    }
}
