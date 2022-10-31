<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-300 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue']) }}>
    {{ $slot }}
</button>
