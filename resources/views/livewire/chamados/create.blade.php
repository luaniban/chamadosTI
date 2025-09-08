
<div class="min-h-screen p-6 bg-slate-50">

    <div class="max-w-3xl mx-auto shadow-sm bg-white/90 backdrop-blur rounded-2xl ring-1 ring-slate-200">
      <div class="px-6 pt-6">
        <h1 class="text-2xl font-semibold text-slate-800">Abrir Novo Chamado</h1>
        <p class="mt-1 text-sm text-slate-500">Preencha os campos abaixo para registrar o chamado.</p>
      </div>

      <form wire:submit.prevent="store" class="p-6 space-y-6">

        {{-- Título --}}
        <div>
          <label for="titulo" class="mb-1.5 block text-sm font-medium text-slate-700">
            Título <span class="text-rose-500">*</span>
          </label>
          <x-ts-input
            id="titulo"
            wire:model.defer="titulo"
            placeholder="Ex.: Computador da recepção não liga"
            class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 placeholder:text-slate-400"
          />

        </div>

        {{-- Descrição --}}
        <div>
          <label for="descricao" class="mb-1.5 block text-sm font-medium text-slate-700">
            Descrição <span class="text-rose-500">*</span>
          </label>
          <x-ts-textarea
            id="descricao"
            wire:model.defer="descricao"
            placeholder="Descreva o problema, quando começou, medidas já tentadas, etc."
            class="w-full min-h-28 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 placeholder:text-slate-400"
          />

        </div>

        {{-- Grid de selects --}}
        <div class="grid h-40 grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

          {{-- Escola --}}
          <div class="">
            <label for="escola_id" class="mb-1.5 block text-sm font-medium text-slate-700">
              Escola <span class="text-rose-500">*</span>
            </label>

            @php
            $opcoesEscolas = $escolas->map(fn($escola) => [
                'label' => $escola->name,
                'value' => $escola->id,
            ])->toArray();

            // adiciona a opção "placeholder"
            array_unshift($opcoesEscolas, [
                'label' => 'Selecione a escola',
                'value' => '',
            ]);
          @endphp

          <x-ts-select.native
              id="escola_id"
              wire:model.defer="escola_id"
              :options="$opcoesEscolas"
              class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
          />


          </div>

          {{-- Categoria --}}
          <div>
            <label for="categoria" class="mb-1.5 block text-sm font-medium text-slate-700">
              Categoria <span class="text-rose-500">*</span>
            </label>
            @php
            $opcoesCategoria = [
                ['label' => 'Selecione a categoria','value' => ''],
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
            ];
            @endphp

            <x-ts-select.native
                id="categoria"
                wire:model.defer="categoria"
                :options="$opcoesCategoria"
                placeholder="Selecione a categoria"
                class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
            />

          </div>

          {{-- Urgência --}}
          <div>
            <label for="urgencia" class="mb-1.5 block text-sm font-medium text-slate-700">
              Urgência <span class="text-rose-500">*</span>
            </label>
            <x-ts-select.native
              id="urgencia"
              wire:model.defer="urgencia"
              placeholder="Selecione a urgência"
              :options="[
                ['label' => 'Selecione a urgência', 'value' => ''],
                ['label' => 'Baixa', 'value' => 'Baixa'],
                ['label' => 'Média', 'value' => 'Media'],
                ['label' => 'Alta', 'value' => 'Alta'],
              ]"
              class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
            />

          </div>

        </div>

        {{-- Ações --}}
        <div class="flex items-center justify-end gap-3 pt-2">
          <x-ts-button
            type="button"
            wire:click="$refresh"
            variant="secondary"
            class="rounded-xl"
          >
            Limpar
          </x-ts-button>

          <x-ts-button
            type="submit"
            wire:target="store"
            wire:loading.attr="disabled"
            class="text-white bg-blue-600 rounded-xl hover:bg-blue-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500/40"
          >
            <span wire:loading.remove wire:target="store">Enviar Chamado</span>
            <span wire:loading wire:target="store" class="inline-flex items-center gap-2">
              <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4A4 4 0 008 12H4z"></path>
              </svg>
              Enviando...
            </span>
          </x-ts-button>
        </div>

      </form>
    </div>

  </div>
