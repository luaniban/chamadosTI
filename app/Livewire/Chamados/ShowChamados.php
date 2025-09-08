<?php

namespace App\Livewire\Chamados;

use App\Models\Chamado;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowChamados extends Component
{
    public $chamados;
    public $order = "desc";
    public $statusFilter = "Em andamento";
    public $urgenciaFilter = "Alta";
    public $categoriaFilter;
    public $escolas;
    public $escola_id;
    public $search;



    public function mount(){
        $this->chamados = Chamado::where('status', $this->statusFilter)->where('urgencia', $this->urgenciaFilter)->orderBy('created_at', $this->order)->get();
        $this->escolas = \App\Models\Escola::all();
    }


    public function openChamado($chamado){

    }

    public function filtrar(){
        if($this->order == null){
            $this->order = "desc";
        }
        if($this->statusFilter == null){
            $this->statusFilter = "Em andamento";
        }
        if($this->urgenciaFilter == null){
            $this->urgenciaFilter = "Alta";
        }



            $this->chamados = Chamado::where('status', $this->statusFilter)->where('urgencia', $this->urgenciaFilter)->orderBy('created_at', $this->order)->get();


            if($this->categoriaFilter != null ){
                $this->chamados = Chamado::where('status', $this->statusFilter)->where('urgencia', $this->urgenciaFilter)->where('categoria', $this->categoriaFilter)->orderBy('created_at', $this->order)->get();
            }
            if($this->escola_id != null && $this->categoriaFilter == null){
                $this->chamados = Chamado::where('status', $this->statusFilter)->where('urgencia', $this->urgenciaFilter)->where('escola_id', $this->escola_id)->orderBy('created_at', $this->order)->get();
            }
            elseif($this->escola_id != null && $this->categoriaFilter != null){
                $this->chamados = Chamado::where('status', $this->statusFilter)->where('urgencia', $this->urgenciaFilter)->where('categoria', $this->categoriaFilter)->where('escola_id', $this->escola_id)->orderBy('created_at', $this->order)->get();
            }

            if($this->search != null){
                $this->chamados = chamado::where('titulo', 'like', "%$this->search%")->get();

            }


    }


    #[On('dispatch-chamado-feito')]
    public function render()
    {
        return view('livewire.chamados.show-chamados');
    }


}
