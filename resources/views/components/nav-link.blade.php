@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-400 dark:border-blue-600 text-sm font-medium leading-5 text-white dark:text-blue-100 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-100 dark:text-blue-200 hover:text-white dark:hover:text-white hover:border-blue-300 dark:hover:border-blue-700 focus:outline-none focus:text-white dark:focus:text-white focus:border-blue-300 dark:focus:border-blue-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>