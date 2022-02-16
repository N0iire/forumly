<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="relative overflow-hidden bg-gray-100">

    <div class="absolute z-10 w-full opacity-10">
        <img src="{{ asset('img/bg/') }}" alt="" class="object-cover w-full max-h-screen">
    </div>


    {{-- Slot --}}
    <div class="relative z-50 mb-8 font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    <livewire:scripts />
    @bukScripts(true)
</body>

</html>
