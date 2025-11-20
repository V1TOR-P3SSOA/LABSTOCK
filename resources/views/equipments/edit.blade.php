<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <h1>EDITAR EQUIPAMENTO</h1>
    <form class="form" action="{{ route('equipments.update', $equipment ->id) }}" method="POST">
        @csrf 
        @method('PUT')
        
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value = {{ $equipment -> name }}><br>

        <label for="asset_code">Código:</label>
        <input type="text" id="asset_code" name="asset_code" value = {{ $equipment -> asset_code }}><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value = {{ $equipment -> status }}><br>

        <label for="unit">Última Calibração:</label><br>
        <input type="date" id="last_calibration" name="last_calibration" value = {{ $equiament -> last_calibration }}>
        
        <button type="submit">Salvar</button>
        <a href="{{ route('equipaments.index') }}">Cancelar</a>
</form>
</x-app-layout>