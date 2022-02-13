<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- Header --}}
 

    {{-- Navbar --}}
    <x-partials.nav />

    {{-- Slot --}}
    <div class="flex-auto mb-8 font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    <x-partials.footer />

    {{-- Blade UI Kit --}}
    {{-- @bukScripts(true) --}}

    {{-- Livewire --}}
    <livewire:scripts />

</body>

</html>
