<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
           
             {{-- breadcrumb --}}
             <div class="flex items-center pb-2 overflow-y-auto whitespace-nowrap">
                <a href="#" class="text-gray-600 dark:text-gray-200">
                    Postingan
                </a>
        
                <span class="mx-5 text-gray-500 dark:text-gray-300">
                    <x-heroicon-s-chevron-right class="w-5 h-5" />
                </span>
        
                <span class="text-gray-500 dark:text-gray-200 ">
                    {{ $thread->title() }}
                </span>  

                <span class="mx-4 text-gray-500 dark:text-gray-300">
                    <x-heroicon-s-chevron-right class="w-5 h-5" />
                </span>

                <span class=" text-yellow-500 dark:text-gray-300">
                    Edit
                </span>
            </div>

            <article class="p-5 bg-white shadow rounded-lg">
                <div class="w-full">

                    {{-- Create --}}
                    <div class="space-y-6">
                        <x-form action="{{ route('threads.update', $thread->slug()) }}">
                            <div class="space-y-8">

                                {{-- Title --}}
                                <div>
                                    <x-form.label for="title" value="{{ __('Judul') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="$thread->title()" autofocus />
                                    <x-form.error for="title" />
                                </div>

                                {{-- Category --}}
                                <div>
                                    <x-form.label for="category" value="{{ __('Kategori') }}" />
                                    <select name="category" id="category" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id() }}" @if($category->id() == $selectedCategory->id) selected @endif>
                                            {{ $category->name() }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="category" />
                                </div>

                               
                        

                                {{-- Body --}}
                                <div>
                                    <x-form.label for="body" value="{{ __('Deskripsi') }}" />
                                    <x-trix name="body" styling="shadow-inner bg-gray-100 h-56">
                                        {{ $thread->body() }}
                                    </x-trix>
                                    <x-form.error for="body" />
                                </div>

                                {{-- Button --}}
                                <x-buttons.primary>
                                    {{ __('Simpan') }}
                                </x-buttons.primary>
                        </x-form>
                    </div>
                </div>
            </article>
        </section>
    </main>
    @bukScripts(true)
</x-guest-layout>
