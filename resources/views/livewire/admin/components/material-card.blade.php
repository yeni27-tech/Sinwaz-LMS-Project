<div
class=" rounded-lg shadow-inner w-full shadow-slate-900/20 outline-1"
>
    <div class=" min-h-[120px] max-h-[200px] bg-green-600 relative">
        <div class=" absolute bottom-0 left-0 text-9xl opacity-35 rotate-12 text-slate-50">
            <i class="ph-bold ph-book"></i>
        </div>
    </div>

    <div class="flex flex-col gap-2">
        <h1 class=" text-md font-bold truncate px-3 py-2">
            {{ $this -> materialById -> name }}
        </h1>

        <div class="pb-3 text-right flex flex-row gap-2">
            <form id="form-material-{{ $this -> materialById -> id }}" action="{{ route('material.destroy', ['id' => $this -> materialById -> id]) }}" method="post">
                @csrf
                @method('delete')
            </form>

            <a href="{{ route('dashboard.admin.material.edit', ['id' => $this -> materialById -> id]) }}"
            class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition"
            >
                <x-icon.pen :width="18" height="18" />
            </a>

            <button
                id="delete-btn-material-{{ $this -> materialById -> id }}"
                type="button"
                class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition"
                onclick="handleOnDelete('form-material-{{ $this -> materialById -> id }}')"
            >
                <x-icon.trash :width="18" height="18" />
            </button>
        </div>
    </div>
</div>
