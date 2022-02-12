<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-4  bg-gray-800 hover:bg-gray-700 focus:ring-gray-500 focus:ring-offset-gray-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg']) }}>
    {{ $slot }}
</button>
