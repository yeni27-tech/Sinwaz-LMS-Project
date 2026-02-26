<div class=" relative flex flex-col gap-1 justify-center items-center shadow-sm shadow-black/20 border border-slate-900 outline-2 p-3 rounded-lg w-full">
    <div class="absolute right-2 top-2">
        @if ($this -> rank == 3)
                <x-icon.bronze-medal width="40" height="40" />

        @elseif ($this -> rank == 2)
                <x-icon.silver-medal width="40" height="40" />
        @else
                <x-icon.gold-medal width="40" height="40" />
        @endif
    </div>

    <div class=" flex flex-col justify-center items-center gap-1 py-2">
        <div class=" w-[40px] h-[40px] rounded-full bg-red-600 text-slate-50 font-bold flex justify-center items-center">
            {{ $this -> name[0] }}
        </div>

        <h1 class=" font-semibold w-full text-center">
            {{ $this -> name }}
        </h1>

        <div class=" rounded-full flex justify-center items-center font-bold text-slate-50">
            @if ($this -> rank == 3)
                <x-icon.bronze-trophy width="40" height="40" />

            @elseif ($this -> rank == 2)
                <x-icon.silver-trophy width="40" height="40" />
            @else
                <x-icon.gold-trophy width="40" height="40" />
            @endif
        </div>
    </div>

    <h2 class=" font-bold absolute bottom-2 left-2 "><span class=" text-sm font-light">Score</span> {{ $this -> total_score }}</h2>
    <h3 class=" font-bold absolute bottom-2 right-2 "><span class=" font-light text-sm">Rank</span> #{{ $this -> rank }}</h3>
</div>
