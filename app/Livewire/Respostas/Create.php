<?php

namespace App\Livewire\Respostas;

use App\Models\Chamado;
use Livewire\Component;
use App\Models\Resposta;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public $chamado_id;
    public $resposta;
    public $anexo;
    public $status_atualizado;
    public $notificar_solicitante = false;
    public $nota_interna;
    public $modal = false;
    public $tempo_gasto;

    public $chamadoSelecionado;
    public $escola;

    public $respostaExistente;

    #[On('dispatch-open-chamado')]
    public function openModal($id){
        $this->chamadoSelecionado = Chamado::find($id);
        $this->respostaExistente = Resposta::where('chamado_id', $this->chamadoSelecionado->id)->first();
        if($this->respostaExistente){
            $this->resposta                 = $this->respostaExistente->resposta;
            $this->anexo                    = $this->respostaExistente->anexo;
            $this->notificar_solicitante    = $this->respostaExistente->notificar_solicitante;
            $this->nota_interna             = $this->respostaExistente->nota_interna;
            $this->tempo_gasto              = $this->respostaExistente->tempo_gasto;
        }

        $this->escola = \App\Models\Escola::find($this->chamadoSelecionado->escola_id)->name;
        $this->modal = true;
        $this->status_atualizado = $this->chamadoSelecionado->status;
    }

    public function closeModal(){
        $this->modal = false;
    }

    public function executar(){
        $this->validar();

        if($this->respostaExistente){
            $this->atualizar();
        }else{
            $this->criar();
        }

        $this->chamadoSelecionado->update([
            'status' => $this->status_atualizado
        ]);

        $this->closeModal();
        $this->dispatch('dispatch-chamado-feito');
        $this->reset(['resposta', 'anexo', 'status_atualizado', 'notificar_solicitante', 'nota_interna']);
    }


    public function validar(){
        $this->validate([
            'resposta' => 'required|string',
            'anexo' => 'nullable|string', // ajuste para upload se precisar
            'status_atualizado' => 'required',
            'notificar_solicitante' => 'boolean',
            'nota_interna' => 'nullable|string',
            'tempo_gasto' => 'required|numeric',
        ]);

    }


    public function criar()
    {
        Resposta::create([
            'chamado_id'            => $this->chamadoSelecionado->id,
            'responsavel_id'              => auth()->id(),
            'resposta'              => $this->resposta,
            'anexo'                 => $this->anexo ?? null,
            'status_atualizado'     => $this->status_atualizado,
            'notificar_solicitante' => $this->notificar_solicitante,
            'nota_interna'          => $this->nota_interna ?? null,
            'tempo_gasto'           => $this->tempo_gasto
        ]);


        $this->toast()->success('Resposta registrada com sucesso!')->send();

    }


    public function atualizar(){
        $this->respostaExistente->update([
            'resposta'              => $this->resposta,
            'anexo'                 => $this->anexo ?? null,
            'status_atualizado'     => $this->status_atualizado,
            'notificar_solicitante' => $this->notificar_solicitante,
            'nota_interna'          => $this->nota_interna ?? null,
            'tempo_gasto'           => $this->tempo_gasto
        ]);

        $this->toast()->success('Resposta atualizada com sucesso!')->send();

    }




    public function mount(){



    }


    public function render()
    {


        return view('livewire.respostas.create');
    }
}
