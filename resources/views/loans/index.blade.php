<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reservas') }}
        </h2>
    </x-slot>

    <a href="{{ route('loans.create') }}">Registrar nova reserva</a>

    <table>
        <tr>
            <td>USUÁRIO</td>
            <td>EQUIPAMENTO</td>
            <td>DATA DE RESERVA</td>
            <td>DATA DE ENTREGA</td>
            <td>STATUS</td>
        </tr>
        @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan -> user -> name }}</td>
                <td>{{ $loan -> equipment -> name }}<td>
                <td>{{ $loan -> asset_code }}</td>
                <td>{{ $loan -> borrow_date }}</td>
                <td>{{ $loan -> return_date }}</td>
                
                <td>
                    <a href="{{ route('loans.edit', $loan -> id) }}">Editar</a> | <form action="{{ route('reagents.destroy', $loan -> id) }}" method="POST" id="delete">
                        @csrf 
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
</x-app-layout>