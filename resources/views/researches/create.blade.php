<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pesquisas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-6">Criar nova pesquisa</h1>
                    <form class="form" action="{{ route('researches.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Título:</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            @error('title')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="user_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Responsável:</label>
                            <select id="user_id" name="user_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Selecione um usuário</option> <!-- Adicionado value="" -->
                                @foreach ($users as $user)
                                    <!-- 2. Corrigida a lógica do 'old()' para <select> -->
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-4">
                            <label for="start_date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Data de início:</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            @error('start_date')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="end_date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Data de término:</label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            @error('end_date')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Cadastrar</button>
                            <a href="{{ route('researches.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800">Voltar</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>