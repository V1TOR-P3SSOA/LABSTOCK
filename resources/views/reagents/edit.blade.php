<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reagentes') }}
        </h2>
    </x-slot>

    <h1>EDITAR REAGENTE</h1>
    <form class="form" action="{{ route('reagents.update', $reagent ->id) }}" method="POST">
        @csrf 
        @method('PUT')
        
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value = {{ $reagent -> name }}><br>

        <label for="formula">Fórmula:</label>
        <input type="text" id="formula" name="formula" value = {{ $reagent -> formula }}><br>

        <label for="quantity">Quantidade:</label>
        <input type="text" id="quantity" name="quantity" value = {{ $reagent -> quantity }}><br>

        <label for="unit">Unidade:</label>
        <input type="text" id="unit" name="unit" value = {{ $reagent -> unit }}><br>

        <br>
        <button type="submit">Salvar</button>
        <a href="{{ route('reagents.index') }}">Cancelar</a>
</form>
</x-app-layout>