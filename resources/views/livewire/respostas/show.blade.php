<div>
    @if($modal)
        <!-- Overlay -->
        <div class="fixed inset-0 z-50 bg-black/30" wire:click="closeModal">

            <!-- Container do modal -->
            <div class="relative max-w-4xl mx-auto mt-20 transition-all duration-500 ease-out scale-100 bg-white shadow-lg rounded-2xl" wire:click.stop>

                <!-- Cabeçalho -->
                <div class="sticky top-0 z-10 px-6 pt-4 pb-4 bg-gray-200 border-b rounded-md bg-white/80 backdrop-blur">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-800">
                                Resposta do Chamado #1234
                            </h3>
                            <p class="mt-0.5 text-sm text-slate-500">
                                Criado em {{ $created_at }} • Última atualização em {{ $updated_at }}
                            </p>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($status == 'Aguardando usuário')
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">
                                    Status: {{ $status }}
                                </span>
                            @elseif($status == null)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">
                                Status: {{ $status?:'Em andamento' }}
                            </span>
                            @else
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                Status: {{ $status}}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Conteúdo -->
                <div class="px-6 py-5 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                        <!-- Coluna 1: Detalhes -->
                        <section class="lg:col-span-1">
                            <div class="bg-white border rounded-xl border-slate-200">
                                <div class="p-4 border-b">
                                    <h4 class="text-sm font-semibold text-slate-700">Detalhes do Chamado</h4>
                                </div>
                                <dl class="p-4 space-y-3 text-sm">
                                    <div class="grid grid-cols-3 gap-2">
                                        <dt class="col-span-1 text-slate-500">Título</dt>
                                        <dd class="col-span-2 text-slate-800">{{ $titulo }}</dd>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <dt class="col-span-1 text-slate-500">Escola</dt>
                                        <dd class="col-span-2 text-slate-800">{{ $escola }}</dd>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <dt class="col-span-1 text-slate-500">Categoria</dt>
                                        <dd class="col-span-2 text-slate-800">{{ $categoria }}</dd>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <dt class="col-span-1 text-slate-500">Urgência</dt>
                                        <dd class="col-span-2">
                                            <span class="inline-flex rounded-full text-slate-800 ">
                                                {{ $urgencia }}
                                            </span>
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Descrição -->
                            <div class="mt-4 bg-white border rounded-xl border-slate-200">
                                <div class="p-4 border-b">
                                    <h4 class="text-sm font-semibold text-slate-700">Descrição</h4>
                                </div>
                                <div class="p-4 overflow-y-auto text-sm leading-relaxed break-words text-slate-700 max-h-40">
                                    {{ $descricao }}
                                </div>
                            </div>
                        </section>

                        <!-- Coluna 2-3: Resposta -->
                        <section class="lg:col-span-2">
                            <div class="bg-white border rounded-xl border-slate-200">
                                <div class="p-4 border-b">
                                    <h4 class="text-sm font-semibold text-slate-700">Resposta enviada</h4>
                                </div>

                                <div class="p-4 space-y-5">
                                    <!-- Mensagem -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                                            Mensagem para o solicitante
                                        </label>
                                        <div class="p-3 text-sm border rounded-xl bg-slate-50 text-slate-700">
                                            {{ $respostaDoAdmin }}
                                        </div>
                                    </div>

                                    <!-- Anexo -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                                            Anexo
                                        </label>
                                        <div class="text-sm text-blue-600 underline">
                                            relatório-manutencao.pdf
                                        </div>
                                    </div>

                                    <!-- Status / Notificação -->
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Status atualizado</label>
                                            <p class="text-sm text-slate-800">{{ $status }}</p>
                                        </div>
                                        <div>
                                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Notificação</label>
                                            <p class="text-sm text-slate-800">Solicitante notificado por e-mail</p>
                                        </div>
                                    </div>

                                    <!-- Nota interna -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                                            Nota interna (somente equipe)
                                        </label>
                                        <div class="p-3 text-sm italic border rounded-xl bg-slate-50 text-slate-500">
                                            {{ $nota_interna }}
                                        </div>
                                    </div>

                                    <!-- Tempo gasto -->
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label class="mb-1.5 block text-sm font-medium text-slate-700">Tempo gasto</label>
                                            <p class="text-sm text-slate-800">{{ $tempo_gasto }} minutos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

            </div> <!-- fim container do modal -->

        </div> <!-- fim overlay -->
    @endif
</div>
