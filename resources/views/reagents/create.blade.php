<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reagentes') }}
        </h2>
    </x-slot>

    <h1>ADICIONAR NOVO REAGENTE</h1>
    <form class="form" action="{{ route('reagents.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"><br>

        <label for="formula">Fórmula:</label>
        <input type="text" id="formula" name="formula"><br>

        <label for="quantity">Quantidade:</label>
        <input type="text" id="quantity" name="quantity"><br>

        <label for="unit">Unidade:</label>
        <input type="text" id="unit" name="unit"><br>

        <br>
        <button type="submit">Cadastrar</button>
        <a href="{{ route('reagents.index') }}">Voltar</a>
</form>
</x-app-layout>