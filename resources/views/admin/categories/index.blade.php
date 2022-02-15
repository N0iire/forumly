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
                        <x-table.head>Id</x-table.head>
                        <x-table.head>Nama</x-table.head>
                        <x-table.head>Slug</x-table.head>
                        <x-table.head class="text-center">Dibuat pada</x-table.head>
                        <x-table.head class="text-center">Aksi</x-table.head>
                    </tr>
                </thead>
           
                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($categories as $category)
                    <tr>
                        <x-table.data>
                            <div>{{ $category->id }}</div>
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

                            
                                    <button type="button" onclick="toggleModal('modal-id')" class="text-red-400">
                                        <x-zondicon-trash class="w-5 h-5" />
                                    </button>
                             

                                 <!--Modal Box-->
                                  <div class="hidden transition ease-in-out delay-150 overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                                    <div class="relative w-auto my-6 mx-auto max-w-4xl">
                                      <!--content-->
                                      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div class="flex items-start justify-between p-4 border-b border-solid border-blue-200 rounded-t">
                                          <h3 class="text-3xl font-semibold">
                                            Hapus Kategori
                                          </h3>
                                          <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                               
                                             <x-heroicon-s-x  class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"/>
                                            
                                          </button>
                                        </div>
                                        <!--body-->
                                        <div class="relative p-6 my-4 flex-auto text-2xl">
                                          <h4>Apakah Anda yakin ingin menghapus Kategori?</h4> 
                                        </div>
                                        <!--footer-->
                                        <div class="flex items-center justify-end p-3 border-t border-solid border-blueGray-200 rounded-b">
                                            <x-form action="{{ route('admin.categories.delete', $category) }}" method="DELETE">
                                            <button type="submit" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                                Hapus
                                              </button>
                                            </x-form>
                                            <button class="text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                            Batal
                                          </button>
       
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="hidden opacity-25 fixed inset-0 z-40 mr-4 bg-black" id="modal-id-backdrop"></div>
                                  <script type="text/javascript">
                                    function toggleModal(modalID){
                                      document.getElementById(modalID).classList.toggle("hidden");
                                      document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                                      document.getElementById(modalID).classList.toggle("flex");
                                      document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                                    }
                                  </script>

                            </div>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </section>


</x-app-layout>
