<div>
<div class="min-h-screen p-6 bg-slate-50">
    <div class="max-w-5xl mx-auto shadow-sm bg-white/90 backdrop-blur rounded-2xl ring-1 ring-slate-200">

        <!-- Cabeçalho -->
        <div class="px-6 pt-6 border-b border-slate-200">
            <h1 class="text-2xl font-semibold text-slate-800">Meus Chamados</h1>
            <p class="mt-1 text-sm text-slate-500">Acompanhe o status de todos os chamados enviados.</p>
        </div>

        <!-- Lista de chamados -->
        <div class="divide-y divide-slate-200">
            @foreach ($chamados as $chamado)
            
                <div class="flex items-center justify-between p-6 transition hover:bg-slate-50"
                     wire:click="dispatchShowResponse({{ $chamado->id }})">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-700">{{ $chamado->titulo }}</h2>
                        <p class="text-sm text-slate-500">Categoria: {{ $chamado->categoria }}</p>
                    </div>
                    @if($chamado->status == 'Aguardando usuário')
                        <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">
                            {{ $chamado->status }}
                        </span>
                    @elseif($chamado->status == 'Em andamento')
                        <span class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">
                            {{ $chamado->status }}
                        </span>
                    @elseif($chamado->status == 'Em analise')
                        <span class="px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full">
                            {{ $chamado->status }}
                        </span>
                    @elseif($chamado->status == 'Resolvido')
                        <span class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                            {{ $chamado->status }}
                        </span>
                    @elseif($chamado->status == 'Fechado')
                        <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">
                            {{ $chamado->status }}
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="p-6 ">
    <livewire:respostas.show />
</div>
</div>
