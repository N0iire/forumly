@props(['active'])

@php
$classes = ($active ?? false)
? 'text-gray-600 rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-gray-400 hover:bg-gray-100 flex items-center  p-2 my-4 transition-colors'
: 'hover:text-gray-800 rounded-lg font-thin text-gray-500 dark:text-gray-400 hover:bg-gray-100 flex items-center  p-2 my-4 transition-colors';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
