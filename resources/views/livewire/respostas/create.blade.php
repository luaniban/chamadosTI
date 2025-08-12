<div>
    @if($modal)
    <x-ts-modal title="Responder Chamado #1234" wire
    max-width="6xl"
    size="4xl"
    >

        <div class="sticky top-0 z-10 px-6 pt-2 pb-4 border-b bg-white/80 backdrop-blur">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h3 class="text-lg font-semibold text-slate-800">

                    </h3>
                    <p class="mt-0.5 text-sm text-slate-500">
                        Criado em 30/07/2025 14:21 • Última atualização há 5 min
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-full bg-amber-100 text-amber-700">
                        Status: Em andamento
                    </span>

                </div>
            </div>
        </div>

        {{-- Conteúdo --}}
        <div class="px-6 py-5 max-h-[70vh] overflow-y-auto">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                {{-- Coluna 1: Detalhes (somente leitura) --}}
                <section class="lg:col-span-1">
                    <div class="bg-white border rounded-xl border-slate-200">
                        <div class="p-4 border-b">
                            <h4 class="text-sm font-semibold text-slate-700">Detalhes do Chamado</h4>
                        </div>
                        <dl class="p-4 space-y-3 text-sm">
                            <div class="grid grid-cols-3 gap-2">
                                <dt class="col-span-1 text-slate-500">Título </dt>
                                <dd class="col-span-2 text-slate-800">{{ $chamadoSelecionado->titulo }}</dd>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <dt class="col-span-1 text-slate-500">Escola</dt>
                                <dd class="col-span-2 text-slate-800">{{ $escola }}</dd>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <dt class="col-span-1 text-slate-500">Categoria</dt>
                                <dd class="col-span-2 text-slate-800">{{ $chamadoSelecionado->categoria }}</dd>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <dt class="col-span-1 text-slate-500">Urgência</dt>
                                <dd class="col-span-2">
                                    <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium bg-rose-100 text-rose-700">
                                       {{ $chamadoSelecionado->urgencia }}
                                    </span>
                                </dd>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <dt class="col-span-1 text-slate-500">Status</dt>
                                <dd class="col-span-2 text-slate-800">{{ $chamadoSelecionado->status }}</dd>
                            </div>
                        </dl>
                    </div>

                    {{-- Descrição opcional --}}
                    <div class="mt-4 bg-white border rounded-xl border-slate-200">
                        <div class="p-4 border-b">
                            <h4 class="text-sm font-semibold text-slate-700">Descrição</h4>
                        </div>
                        <div class="p-4 overflow-y-auto text-sm leading-relaxed break-words text-slate-700 max-h-96">
                            {{$chamadoSelecionado->descricao}}
                        </div>
                    </div>


                </section>

                {{-- Coluna 2-3: Formulário visual (sem funcionalidade) --}}
                <section class="lg:col-span-2">
                    <div class="bg-white border rounded-xl border-slate-200">
                        <div class="p-4 border-b">
                            <h4 class="text-sm font-semibold text-slate-700">Responder</h4>
                        </div>

                        <div class="p-4 space-y-5">
                            {{-- Mensagem --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">
                                    Mensagem para o solicitante <span class="text-rose-500">*</span>
                                </label>
                                <x-ts-textarea
                                    placeholder="Descreva o diagnóstico, orientações ou correção aplicada…"
                                    class="w-full min-h-32 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 placeholder:text-slate-400" wire:model="resposta"
                                />
                                <p class="mt-1 text-xs text-slate-500">Esta mensagem será enviada ao solicitante.</p>
                            </div>

                            {{-- Anexos --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">
                                    Anexo (opcional)
                                </label>
                                <x-ts-input
                                wire:model="anexo"
                                    type="file"
                                    multiple
                                    class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
                                />
                                <p class="mt-1 text-xs text-slate-500">PNG, JPG ou PDF até 5 MB por arquivo.</p>
                            </div>

                            {{-- Status / Notificação --}}
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Atualizar status</label>
                                    <x-ts-select.styled wire:model="status_atualizado"
                                        :options="[

                                            ['label' => 'Em análise',           'value' => 'Em analise'],
                                            ['label' => 'Em andamento',         'value' => 'Em andamento'],
                                            ['label' => 'Aguardando usuário',   'value' => 'Aguardando usuario'],
                                            ['label' => 'Resolvido',            'value' => 'Resolvido'],
                                            ['label' => 'Fechado',              'value' => 'Fechado'],
                                        ]"
                                        placeholder="Selecione"
                                        class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
                                    />
                                </div>

                                <div class="flex items-end">
                                    <label class="flex items-center gap-2 text-sm text-slate-700">
                                        <x-ts-toggle wire:model="notificar_solicitante" />
                                        Notificar solicitante por e‑mail
                                    </label>
                                </div>
                            </div>

                            {{-- Nota interna --}}
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-slate-700">
                                    Nota interna (somente equipe)
                                </label>
                                <x-ts-textarea wire:model="nota_interna"
                                    placeholder="Registro interno (SLA, troubleshooting detalhado, inventário, etc.)"
                                    class="w-full min-h-24 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 placeholder:text-slate-400"
                                />
                            </div>

                            {{-- Tempo / Responsável --}}
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-slate-700">Tempo gasto (min)</label>
                                    <x-ts-input
                                        wire:model="tempo_gasto"
                                        type="number"
                                        min="0"
                                        step="5"
                                        placeholder="Ex.: 30"
                                        class="w-full h-11 rounded-xl border-slate-300 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
                                    />
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        {{-- Rodapé --}}
        <div class="sticky bottom-0 z-10 px-6 py-4 border-t bg-white/80 backdrop-blur">
            <div class="flex items-center justify-end gap-3">
                <x-ts-button variant="secondary" wire:click='closeModal'>
                    Cancelar
                </x-ts-button>

                <x-ts-button color="blue" class="text-white" wire:click='executar'>
                    Enviar resposta
                </x-ts-button>
            </div>
        </div>
    </x-ts-modal>
    @endif
</div>
