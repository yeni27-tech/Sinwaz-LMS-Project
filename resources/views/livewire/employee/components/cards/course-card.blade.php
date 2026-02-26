<a href="{{ route('course.detail', ['id' => $this -> courseById -> id]) }}" class=" rounded-lg shadow-inner bg-slate-50 w-full">
    <div class=" min-h-[120px] max-h-[200px] bg-blue-500 relative">
        <div class=" absolute bottom-0 left-0 text-9xl opacity-35 rotate-12 text-slate-50">
            <i class="ph-bold ph-book"></i>
        </div>
    </div>

    <div class=" p-2 flex flex-col gap-2">
        <div class=" capitalize mt-2 mb-1 bg-gray-200/60 px-3 py-1 w-fit text-xs font-semibold rounded-full">
            {{ $this -> courseById -> divisi -> name }}
        </div>

        <h1 class=" text-md font-bold truncate">
            {{ $this -> courseById -> name }}
        </h1>
        <p class=" text-xs line-clamp-2 text-justify">
            {{ $this -> courseById -> description }}
        </p>
    </div>
</a>
