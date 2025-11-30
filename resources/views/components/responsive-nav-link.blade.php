@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-blue-400 dark:border-blue-600 text-start text-base font-medium text-blue-800 dark:text-blue-100 bg-blue-100 dark:bg-blue-900/50 focus:outline-none focus:text-blue-900 dark:focus:text-blue-50 focus:bg-blue-200 dark:focus:bg-blue-800 focus:border-blue-700 dark:focus:border-blue-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-blue-100 dark:text-blue-200 hover:text-white dark:hover:text-white hover:bg-blue-600 dark:hover:bg-blue-800 hover:border-blue-500 dark:hover:border-blue-600 focus:outline-none focus:text-white dark:focus:text-white focus:bg-blue-600 dark:focus:bg-blue-800 focus:border-blue-500 dark:focus:border-blue-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>