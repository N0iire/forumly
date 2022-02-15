<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <section class="px-6" style="thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
    thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}
    
    tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
    tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}
    ">
        <div class="overflow-hidden table-auto border border-gray-100 rounded-md">
            <table class="min-w-full">

                <thead style="border-radius:6px;">
                    <tr class=" text-sm font-medium bg-gray-300 text-left" style="background-color:#FC9B5C; ">
                        <x-table.head>No</x-table.head>
                        <x-table.head>Nama</x-table.head>
                        <x-table.head>Slug</x-table.head>
                        <x-table.head class="text-center">Dibuat pada</x-table.head>
                        <x-table.head class="text-center">Aksi</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <x-table.data>
                                <div>{{ $i++ }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>{{ $category->name }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>{{ $category->slug }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div class="text-center">{{ $category->createdAt() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div class="flex justify-center space-x-4">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-yellow-400">
                                        <x-zondicon-edit-pencil class="w-5 h-5" />
                                    </a>
                                    <a href="{{ route('admin.categories.delete', $category->slug) }}">
                                        <button type="button" class="text-red-400"
                                            onclick="return confirm('Are you sure?')">
                                            <x-zondicon-trash class="w-5 h-5" />
                                        </button>
                                    </a>
                                </div>
                            </x-table.data>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
