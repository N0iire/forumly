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
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Tanggal Bergabung</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($users as $activity)
                    <tr>
                            <x-table.data>
                                <div class="overflow-hidden">{{ $activity->user->name }}</div>
                            </x-table.data>      
                            <x-table.data>
                                <div class="overflow-hidden">{{ $activity->user->email }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div class="overflow-hidden">{{ $activity->user->bio }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div class="overflow-hidden">
                                    @php
                                        $i = $activity->user->type;
                                    @endphp
                                    @switch($i)
                                        @case(1)
                                            Default
                                            @break
                                        @case(3)
                                            Admin
                                        @break
                                        @default
                                            Guest
                                    @endswitch
                                </div>
                            </x-table.data>
                            <x-table.data>
                                <div class="overflow-hidden">{{ $activity->user->email_verified_at }}</div>
                            </x-table.data>        
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </section>
</x-app-layout>
