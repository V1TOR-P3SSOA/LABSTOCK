<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Reservas') }}
    </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h1 class="text-2xl font-semibold mb-6">Criar Nova Reserva</h1>
                    <form action="{{ route('loans.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="user_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Usuário (Solicitante):</label>
                            <select id="user_id" name="user_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Selecione um usuário</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="equipment_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Equipamento:</label>
                            <select id="equipment_id" name="equipment_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Selecione um equipamento</option>

                                @foreach ($equipments as $equipment)
                                    <option value="{{ $equipment->id }}">
                                        {{ $equipment->name }} (Cód: {{ $equipment->asset_code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('equipment_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="borrow_date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Data de Retirada:</label>
                            <input type="date" id="borrow_date" name="borrow_date" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                            @error('borrow_date')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="return_date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Data Prevista de Devolução:</label>
                            <input type="date" id="return_date" name="return_date" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            @error('return_date')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="status" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Status:</label>
                            <select id="status" name="status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="Reservado">Reservado</option>
                                <option value="Emprestado">Emprestado</option>
                                <option value="Disponível">Disponível</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Cadastrar Reserva
                            </button>
                            <a href="{{ route('loans.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                Voltar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>