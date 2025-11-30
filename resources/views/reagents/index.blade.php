<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{ __('Reagentes') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (session('status'))
                    <x-alert type="success" :message="session('status')" />
                @endif
                <div class="mb-6">
                    <a href="{{ route('reagents.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Adicionar novo reagente
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-blue-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Fórmula
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Quantidade
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Medida
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($reagents as $reagent)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $reagent->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $reagent->formula }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $reagent->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $reagent->unit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('reagents.edit', $reagent->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-100">Editar</a>
                                        <form action="{{ route('reagents.destroy', $reagent->id) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Tem certeza que deseja excluir este reagente?');">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-100">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>