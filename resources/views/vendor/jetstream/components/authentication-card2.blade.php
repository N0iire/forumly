<div class="absolute center-0 right-0 mr-40 mt-10">
    <div class="flex flex-col z-50 items-center mt-5 pt-6 sm:justify-center sm:pt-0">

        <div class="flex items-center  justify-center w-full py-4 bg-white sm:max-w-md rounded-t-md">
            <a href="{{ route('home') }}">
                {{ $logo }}
            </a>
        </div>

        <div class="w-full px-6 py-4 overflow-hidden bg-white shadow-md sm:max-w-md rounded-b-md">
            {{ $slot }}
        </div>
    </div>

</div>