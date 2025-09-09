<div class="min-h-96">
    <div class="grid grid-cols-6 gap-4 mb-4 ">
        <x-ts-input icon="magnifying-glass" placeholder="Pesquisar..." wire:change="filtrar" wire:model.debounce="search" class=""></x-ts-input>


        @php
            $opcoesEscolas = $escolas->map(fn($escola) => [
                'label' => $escola->name,
                'value' => $escola->id,
            ])->toArray();



        @endphp
        <x-ts-select.styled wire:change="filtrar" wire:model="" placeholder="Filtrar por escola..."
        wire:model="escola_id"
        :options="$opcoesEscolas"
        searchable
        />
        <x-ts-select.styled wire:change="filtrar" wire:model="categoriaFilter" placeholder="Filtrar por categoria..." :options="[

                ['label' => 'Hardware (PC/Notebook/Periféricos)', 'value' => 'hardware'],
                ['label' => 'Rede & Internet (cabeada)',          'value' => 'rede_internet'],
                ['label' => 'Wi‑Fi / Autenticação',                'value' => 'wifi'],
                ['label' => 'Impressão & Digitalização',           'value' => 'impressao'],
                ['label' => 'Sistemas da Prefeitura/Escola',       'value' => 'sistemas'],
                ['label' => 'Instalação/Configuração de Software', 'value' => 'instalacao_software'],
                ['label' => 'E‑mail Institucional',                'value' => 'email'],
                ['label' => 'Acesso, Contas e Permissões',         'value' => 'acesso_contas'],
                ['label' => 'Plataformas Educacionais (Classroom/Teams)', 'value' => 'plataformas_educacionais'],
                ['label' => 'Audiovisual (Projetor/TV/Som)',       'value' => 'audiovisual'],
                ['label' => 'Telefonia/VoIP',                      'value' => 'telefonia'],
                ['label' => 'Infraestrutura Elétrica/No‑break',    'value' => 'infra_eletrica'],
                ['label' => 'Segurança (Antivírus/Backup)',        'value' => 'seguranca'],
                ['label' => 'Solicitação de Compra/Orçamento',     'value' => 'solicitacao_compra'],
                ['label' => 'Dúvida/Orientação',                   'value' => 'duvida'],
                ['label' => 'Outros',                               'value' => 'outros'],

        ]"/>
        <x-ts-select.styled wire:change="filtrar" wire:model="urgenciaFilter" placeholder="Filtrar por urgência..."
        :options="[
                ['label' => 'Baixa', 'value' => 'Baixa'],
                ['label' => 'Média', 'value' => 'Media'],
                ['label' => 'Alta', 'value' => 'Alta'],
        ]"/>
        <x-ts-select.styled wire:change="filtrar" wire:model="statusFilter" placeholder="Filtrar por status..."
        :options="[
            ['label' => 'Em analise', 'value' => 'Em analise'],
            ['label' => 'Em andamento',         'value' => 'Em andamento'],
            ['label' => 'Aguardando usuario',   'value' => 'Aguardando usuario'],
            ['label' => 'Resolvido',            'value' => 'Resolvido'],
            ['label' => 'Fechado',              'value' => 'Fechado'],
        ]"/>
        <x-ts-select.styled wire:change="filtrar" wire:change="filtrar" placeholder="Filtrar por criado em..." wire:model="order" :options="[
            ['label' => 'Recentes', 'value' => 'desc'],
            ['label' => 'Antigos', 'value' => 'asc'],
        ]"/>
    </div>
    <table class="min-w-full text-sm text-left table-fixed ">
        <thead>
            <tr class="text-xs text-gray-600 uppercase bg-gray-100">
                <th class="w-[200px] px-4 py-2">Título</th>
                <th class="w-[160px] px-4 py-2">Escola</th>
                <th class="w-[140px] px-4 py-2">Categoria</th>
                <th class="w-[100px] px-4 py-2">Urgência</th>
                <th class="w-[100px] px-4 py-2">Status</th>
                <th class="w-[160px] px-4 py-2">Criado em</th>
                <th class="w-[10px] px-4 py-2"></th>
            </tr>
        </thead>
        @foreach ($chamados as $chamado)
        <tbody class="text-gray-700">
            <tr>
            <td class="w-[200px] px-4 py-2 truncate">{{ $chamado->titulo }}</td>
            <td class="w-[160px] px-4 py-2 truncate">{{ $chamado->escola->name }}</td>
            <td class="w-[140px] px-4 py-2 truncate">{{ $chamado->categoria }}</td>
            @if($chamado->urgencia == "Alta")
            <td class="w-[100px] px-4 py-2 font-medium text-red-600 truncate">{{ $chamado->urgencia }}</td>
            @elseif($chamado->urgencia == "Media")
            <td class="w-[100px] px-4 py-2 font-medium text-yellow-500 truncate">{{ $chamado->urgencia }}</td>
            @else
            <td class="w-[100px] px-4 py-2 font-medium text-green-600 truncate">{{ $chamado->urgencia }}</td>
            @endif
            <td class="w-[100px] px-4 py-2  text-gray-600 truncate">{{ $chamado->status }}</td>
            <td class="w-[160px] px-4 py-2 truncate">{{ $chamado->created_at }}</td>
            <td class="w-[10px] px-4 py-2 truncate"><x-ts-button icon="wrench" color="blue" @click="$dispatch('dispatch-open-chamado', { id: '{{ $chamado->id}}' })"></x-ts-button></td>

          </tr>
          <tr class="border-b ">

          </tr>
        </tbody>
        @endforeach
      </table>






<livewire:respostas.create />
<x-ts-toast />

</div>
