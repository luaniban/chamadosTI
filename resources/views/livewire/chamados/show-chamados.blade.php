<div>
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
            <td class="w-[160px] px-4 py-2 truncate">EMEF João Silva</td>
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
