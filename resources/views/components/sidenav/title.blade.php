@php
$classes = 'text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal';
@endphp

<div>
    <h2 {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </h2>
</div>
