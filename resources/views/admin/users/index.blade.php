<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Pengguna') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border border-gray-100 rounded-md">
            <table class="min-w-full">
                <thead class="rounded-lg" style="background-color:#FC9B5C; ">
                    <tr>
                        <x-table.head>Nama</x-table.head>
                        <x-table.head>Email</x-table.head>
                        <x-table.head>Birthday</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Tanggal Bergabung</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    <tr>
                        <x-table.data>
                            <div class="overflow-hidden">Angga Cahya Abadi</div>
                        </x-table.data>
                        <x-table.data>
                            <div>angzai@gmail.com</div>
                        </x-table.data>
                        <x-table.data>
                            <div>date</div>
                        </x-table.data>
                        <x-table.data>
                            <div class="px-2 py-1 text-center text-gray-700 bg-green-200 rounded">
                                Moderator
                            </div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">2005-14-06</div>
                        </x-table.data>
                    </tr>
                </tbody>

            </table>
        </div>
    </section>
</x-app-layout>
