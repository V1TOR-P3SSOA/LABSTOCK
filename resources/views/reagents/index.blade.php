<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reagentes') }}
        </h2>
    </x-slot>

    <a href="{{ route('reagents.create') }}">Adicionar novo reagente</a>

    <table>
        <tr>
            <td>NOME</td>
            <td>FÓRMULA</td>
            <td>QUANTIDADE</td>
            <td>MEDIDA</td>
        </tr>
        @foreach ($reagents as $reagent)
            <tr>
                <td>{{ $reagent -> name }}</td>
                <td>{{ $reagent -> formula }}<td>
                <td>{{ $reagent -> quantity }}</td>
                <td>{{ $reagent -> unit }}</td>
                <td>
                    <a href="{{ route('reagents.edit', $reagent -> id) }}">Editar</a> | <form action="{{ route('reagents.destroy', $reagent -> id) }}" method="POST" id="delete">
                        @csrf 
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
</x-app-layout>