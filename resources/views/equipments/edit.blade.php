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
        <input type="text" id="name" name="name" value = {{ $equipment -> name }}>

        <label for="asset_code">Código:</label>
        <input type="text" id="asset_code" name="asset_code" value = {{ $equipment -> asset_code }}>

        <label for="status">Status
        <select name="status" id="status">

            <option value={{ $equipment -> status }}></option>

            <option value="Livre">Livre</option>

            <option value="Reservado">Reservado</option>

        </select>

        <label for="unit">Última Calibração:</label><br>
        <input type="date" id="last_calibration" name="last_calibration" value = {{ $equipment -> last_calibration }}>
        
        <button type="submit">Salvar</button>
        <a href="{{ route('equipments.index') }}">Cancelar</a>
</form>
</x-app-layout>