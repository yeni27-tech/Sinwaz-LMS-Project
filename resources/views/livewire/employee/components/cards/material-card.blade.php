<a href="{{ route('material.detail', ['id' => $this -> materialById -> id]) }}" class=" rounded-lg shadow-inner w-full shadow-slate-900/20 outline-1">
    <div class=" min-h-[120px] max-h-[200px] bg-green-600 relative">
        <div class=" absolute bottom-0 left-0 text-9xl opacity-35 rotate-12 text-slate-50">
            <i class="ph-bold ph-book"></i>
        </div>
    </div>

    <div class=" p-2 flex flex-col gap-2">
        <h1 class=" text-md font-bold truncate">
            {{ $this -> materialById -> name }}
        </h1>

        {{-- <p class=" text-xs line-clamp-2 text-justify">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus distinctio explicabo aliquid vel veniam consectetur nobis, magni illo dolore blanditiis.
        </p> --}}

    </div>
</a>
