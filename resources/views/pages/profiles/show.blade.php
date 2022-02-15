<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <aside class="flex flex-col items-center h-full p-4 space-y-4  rounded-lg">

            <div class="shadow-lg rounded-2xl w-72 bg-white dark:bg-gray-800">
                <x-logos.bg class="rounded-t-lg h-28 w-full mb-4 "/>
                <div class="flex flex-col items-center justify-center p-4 -mt-16">
                    <a href="#" class="block relative">
                        
                        <a href="{{ route('profile', $user) }}" class="flex flex-col items-center text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                            <img class="object-cover w-16 h-16 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name() }}" />
                            <span class="flex text-gray-800 dark:text-white text-xl font-medium mt-2">{{ $user->name() }} </span>
                        </a>
                    </a>
                   
                   
                    <p class="text-xs p-2 bg-green-500 text-white px-4 mt-3 rounded-full">
                        {{ $user->rank() }}
                    </p>
                    <div class="rounded-lg p-2 w-full mt-4">
                        <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-200">
                            <p class="flex flex-col">
                                Pengikut
                                <span class="text-black dark:text-white font-bold">
                                    {{ count($user->followers()) }}
                                </span>
                            </p>
                            <p class="flex flex-col">
                                Dikuti
                                <span class="text-black dark:text-white font-bold">
                                    {{ count($user->follows) }}
                                </span>
                            </p>
                            <p class="flex flex-col">
                                Bergabung
                                <span class="text-black dark:text-white font-bold">
                                    {{ $user->createdAt() }}
                                </span>
                            </p>
                        </div>
                        
                    </div>
                    @auth
            @unless (auth()->user()->is($user))
            {{-- Follow Buttons --}}

                <div class="w-full">
                    @if(auth()->user()->isFollowing($user))
                    <x-form action="{{ route('follow', $user) }}">
                        <x-jet-button2>
                            {{ __('Batal Ikuti') }}
                        </x-jet-button2>
                    </x-form>
                    @else
                    <x-form action="{{ route('follow', $user) }}">
                        <x-jet-button2>
                            {{ __('Ikuti') }}
                        </x-jet-button2>
                    </x-form>
                    @endif
                </div>
                @endunless
                @endauth
                </div>
            </div>
           
        </aside>

        <section class="flex flex-col col-span-3 gap-y-4">
            <x-alerts.main />

            <span class="w-full p-2 mt-4 font-bold text-blue-500 bg-white rounded shadow">
                Post Terbaru
            </span>

            @foreach($user->latestThreads() as $thread)
            <article class="p-5 bg-white shadow rounded-lg">
                <div class="relative grid grid-cols-8">
                    {{-- Thread --}}
                    <div class="relative col-span-7 space-y-6 ">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400">
                                {{ $thread->title() }}
                            </h2>
                            <div class="text-gray-500">
                                {!! $thread->body() !!}
                            </div>
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                <livewire:like-thread :thread="$thread" />
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Diposting: {{ $thread->created_at->diffForHumans() }}
                            </div>
                        </div>


                    </div>
                    {{-- Edit Button --}}
                    <div class="absolute top-0 right-2">
                        <div class="flex space-x-2">
                            @can(App\Policies\ThreadPolicy::UPDATE, $thread)
                            <x-links.secondary href="{{ route('threads.edit', $thread->slug()) }}">
                                Edit
                            </x-links.secondary>
                            @endcan

                            @can(App\Policies\ThreadPolicy::DELETE, $thread)
                            <livewire:thread.delete :thread="$thread" :key="$thread->id()" />
                            @endcan
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </section>
    </main>
</x-guest-layout>
