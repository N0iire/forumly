<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav :thread="$thread" />

        <section class="flex flex-col col-span-3 gap-y-4">

            <x-alerts.main />

            
            {{-- breadcrumbs --}}
            <div class="flex items-center pb-2 overflow-y-auto whitespace-nowrap">
                <span class="text-gray-600 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                </span>
        
                <span class="mx-5 text-gray-500 dark:text-gray-300">
                    <x-heroicon-s-chevron-right class="w-5 h-5" />
                </span>
        
                <span class="text-gray-500 dark:text-gray-200 ">
                    {{ $category->name() }}
                </span>  

                <span class="mx-5 text-gray-500 dark:text-gray-300">
                    <x-heroicon-s-chevron-right class="w-5 h-5" />
                </span>
        
                <span class="text-yellow-500 dark:text-gray-200 ">
                    {{ $thread->title() }}
                </span>  
            </div>

            <article class="p-5 bg-white shadow rounded-lg">
                <div class="relative grid grid-cols-8">

                    


                    {{-- Thread --}}
                    <div class="relative col-span-7 space-y-6">
                        <div class="space-y-3">
                            {{-- Avatar --}}
                            <div class="col-span-1">
                                <x-user.avatar :user="$thread->author()" />
                            </div>
                            <h2 class="text-xl tracking-wide hover:text-blue-400">
                                {{ $thread->title() }}
                            </h2>
                            <div class="text-gray-500">
                                {!! $thread->body() !!}
                            </div>
                        </div>

                        <div class="flex justify-between">

                            <div class="flex space-x-5 text-gray-500">
                                {{-- Likes --}}
                                <livewire:like-thread :thread="$thread" />

                                {{-- View Count --}}
                                <div class="flex items-center space-x-2">
                                    <x-heroicon-o-eye class="w-4 h-4 text-blue-300" />
                                    <span class="text-xs text-gray-500">{{ views($thread)->count() }}</span>
                                </div>
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

            {{-- Replies --}}
            <div class="mt-6 space-y-5">
                <h2 class="mb-0 text-sm font-bold uppercase">Komentar</h2>
                <hr>
                @foreach($thread->replies() as $reply)
                <livewire:reply.update :reply="$reply" :wire:key="$reply->id()" />
                @endforeach
            </div>

            @auth
            <div class="p-5 space-y-4 bg-white shadow rounded-lg">
                <h2 class="text-gray-500">Kirim komentar</h2>
                <x-form action="{{ route('replies.store') }}">
                    <div>
                        <input type="text" name="body" class="w-full rounded-md bg-gray-200 border-none shadow-inner focus:ring-blue-400" />
                        <x-form.error for="body" />

                        <input type="hidden" name="replyable_id" value="{{ $thread->id() }}">
                        <x-form.error for="replyable_id" />
                        <input type="hidden" name="replyable_type" value="threads">
                        <x-form.error for="replyable_type" />

                    </div>

                    <div class="grid mt-4">
                        {{-- Button --}}
                        <x-buttons.primary class="justify-self-end">
                            {{ __('Kirim') }}
                        </x-buttons.primary>
                    </div>
                </x-form>
            </div>
            @else
            <div class="flex justify-between p-4 text-gray-700 bg-blue-200 rounded">
                <h2>Anda harus login terlebih dahulu sebelum mengirim komentar</h2>
                <a href="{{ route('login') }}">Login</a>
            </div>
            @endauth
        </section>
    </main>
</x-guest-layout>
