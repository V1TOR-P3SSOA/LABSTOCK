<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <h1>ADICIONAR NOVO EQUIPAMENTO</h1>
    <form class="form" action="{{ route('equipment.store') }}" method="POST">
        @csrf 
      
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"><br>

        <label for="asset_code">Código:</label>
        <input type="text" id="asset_code" name="asset_code"><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status"><br>

        <label for="unit">Última Calibração:</label>
        <input type="date" id="last_calibration"><br>
        
        <button type="submit">Adicionar</button>
        <a href="{{ route('equipaments.index') }}">Cancelar</a>
</form>
</x-app-layout>