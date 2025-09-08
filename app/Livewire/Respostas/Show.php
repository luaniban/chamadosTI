<?php

namespace App\Livewire\Respostas;

use App\Models\Escola;
use Livewire\Component;
use App\Models\Resposta;
use Livewire\Attributes\On;

class Show extends Component
{

    public $modal = false;
    public $resposta;
    public $created_at;
    public $updated_at;
    public $status;
    public $titulo;
    public $escola;
    public $categoria;
    public $urgencia;
    public $descricao;
    public $respostaDoAdmin;
    public $nota_interna;
    public $tempo_gasto;


    #[On('dispatch-open-resposta')]
    public function openModal($id){

        $this->reset();
        $this->resposta = Resposta::where('chamado_id', $id)->first();


        if($this->resposta != null){
            $this->created_at = $this->resposta->created_at;
            $this->updated_at = $this->resposta->updated_at;
            $this->status = $this->resposta->chamado->status;
            $this->titulo = $this->resposta->chamado->titulo;
            $this->escola = $this->resposta->chamado->escola->name;
            $this->categoria = $this->resposta->chamado->categoria;
            $this->urgencia = $this->resposta->chamado->urgencia;
            $this->descricao = $this->resposta->chamado->descricao;
            $this->respostaDoAdmin = $this->resposta->resposta;
            $this->nota_interna = $this->resposta->nota_interna;
            $this->tempo_gasto = $this->resposta->tempo_gasto;
        }



        $this->modal = true;
    }

    public function closeModal(){
        $this->modal = false;

    }


    public function resetCampos(){

    }
    public function render()
    {
        return view('livewire.respostas.show');
    }
}
