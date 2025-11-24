<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <a href="{{ route('equipments.create') }}">Adicionar novo equipamento</a>

    <table>
        <tr>
            <td>NOME</td>
            <td>CÓDIGO</td>
            <td>STATUS</td>
            <td>ÚLTIMA CALIBRAÇÃO</td>
        </tr>
        @foreach ($equipments as $equipment)
            <tr>
                <td>{{ $equipment -> name }}</td>
                <td>{{ $equipment -> asset_code }}<td>
                <td>{{ $equipment -> status }}</td>
                <td>{{ $equipment -> last_calibration }}</td>
                <td>
                    <a href="{{ route('reagents.edit', $equipment -> id) }}">Editar</a> | <form action="{{ route('reagents.destroy', $equipment -> id) }}" method="POST" id="delete">
                        @csrf 
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
</x-app-layout>