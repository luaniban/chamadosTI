
    <div>
        <div class="min-h-screen p-6 space-y-6 bg-gray-50">
            <!-- Título -->
            <h1 class="text-3xl font-semibold text-gray-800">Painel de Chamados</h1>

            <!-- Cards de Status -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
              <div class="p-4 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">Chamados Abertos</h2>
                <x-ts-stats :number="$chamadosAbertos" animated  class="mt-2 text-2xl font-bold text-blue-500 shadow-none"/>
              </div>
              <div class="p-4 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">Em Atendimento</h2>
                <x-ts-stats :number="$chamadosEmAtendimento" animated  class="mt-2 text-2xl font-bold text-yellow-500 shadow-none"/>
              </div>
              <div class="p-4 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">Resolvidos</h2>
                <x-ts-stats :number="$chamadosConcluidos" animated  class="mt-2 text-2xl font-bold text-green-500 shadow-none"/>
              </div>
              <div class="p-4 bg-white shadow rounded-2xl">
                <h2 class="text-sm font-medium text-gray-500">Cancelados</h2>
                <x-ts-stats :number="$chamadosEncerrados" animated  class="mt-2 text-2xl font-bold text-red-500 shadow-none"/>
              </div>
            </div>

            <!-- Gráfico de Categorias (placeholder) -->
            <div class="p-4 bg-white shadow rounded-2xl">

              <h2 class="mb-4 text-lg font-semibold text-gray-700">Chamados por Categoria</h2>
              <div class="flex items-center h-64 text-gray-400">

                <div class="w-[80%]">
                    <canvas id="myBarChart" height="70"></canvas>
                </div>
                <div class="w-[20%]">
                    <canvas id="myPieChart" height="250"></canvas>

                </div>


              </div>
            </div>

            <!-- Tabela de Chamados Recentes -->
            <div class="p-4 bg-white shadow rounded-2xl min-h-96">
              <h2 class="mb-4 text-lg font-semibold text-gray-700">Últimos Chamados</h2>
              <div class="overflow-x-auto">
                    <livewire:chamados.show-chamados />



              </div>
            </div>
          </div>
          <script src="https://cdn.tailwindcss.com"></script>
          <script class="" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
                    document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myBarChart').getContext('2d');

            const labels = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Chamados Resolvidos',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            new Chart(ctx, config);
        });
          </script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('myPieChart').getContext('2d');

        let urgenciaBaixa = {{ $urgenciaBaixa ?? 0 }};
        let urgenciaMedia = {{ $urgenciaMedia ?? 0 }};
        let urgenciaAlta  = {{ $urgenciaAlta ?? 0 }};


        const data = {
            labels: ['Baixa', 'Média', 'Alta'],
            datasets: [{
                label: 'Chamados Resolvidos',
                data: [urgenciaBaixa, urgenciaMedia, urgenciaAlta],
                backgroundColor: [
                    'rgb(26, 201, 32)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 99, 132)',
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Status de chamados',  // título fixo igual ao label do dataset
                        font: {
                            size: 20,
                            weight: 'bold'
                        }
                    },
                    legend: {
                        display: true,
                        position: 'bottom',
                    }
                }
            }
        };

        new Chart(ctx, config);
    });
    </script>

    </div>

