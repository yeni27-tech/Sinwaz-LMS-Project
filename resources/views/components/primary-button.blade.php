<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent text-white uppercase transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
