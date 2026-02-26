<section class=" min-w-full h-screen bg-slate-50   flex justify-center items-center">
    <div class=" bg-slate-50 p-7 rounded-lg min-w-[600px] max-w-[800px] flex flex-col gap-3">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h3 class=" text-sm text-slate-400 font-semibold">Anda akan memulai</h3>
                <h1 class=" text-2xl font-bold">{{ $this -> quizById -> name }}</h1>
            </div>

            <a href="{{ route('employee.home') }}">
                menu
            </a>
        </div>

        <div class=" grid grid-cols-1 my-4 place-content-center gap-3">
            <div class=" px-3 p-2 bg-slate-50 shadow-sm shadow-slate-900/10 outline-2 rounded-md border-slate-900 flex flex-row items-center gap-3">
                <div class=" bg-blue-200/80 text-blue-600 rounded-lg w-[50px] h-[50px] flex justify-center items-center text-lg">
                    <i class="ph-bold ph-kanban"></i>
                </div>

                <div class=" flex flex-col gap-">
                    <h3 class=" text-sm text-slate-400 font-semibold">Divisi</h3>
                    <h1 class=" text-xl font-bold">
                            {{ $this -> quizById -> divisi -> name }}

                    </h1>
                </div>
            </div>

            <div class=" px-3 p-2 bg-slate-50 shadow-sm shadow-slate-900/10 outline-2 rounded-md border-slate-900 flex flex-row items-center gap-3">
                <div class=" bg-blue-200/80 text-blue-600 rounded-lg w-[50px] h-[50px] flex justify-center items-center text-lg">
                    <i class="ph-bold ph-notepad"></i>
                </div>

                <div class=" flex flex-col gap-">
                    <h3 class=" text-sm text-slate-400 font-semibold">Jumlah Soal</h3>
                    <h1 class=" text-xl font-bold">{{ $this -> quizById -> question -> count() }} Soal</h1>
                </div>
            </div>

            <div class=" px-3 p-2 bg-slate-50 shadow-sm shadow-slate-900/10 outline-2 rounded-md border-slate-900 flex flex-row items-center gap-3">
                <div class=" bg-blue-200/80 text-blue-600 rounded-lg w-[50px] h-[50px] flex justify-center items-center text-lg">
                    <i class="ph-bold ph-timer"></i>
                </div>

                <div class=" flex flex-col gap-">
                    <h3 class=" text-sm text-slate-400 font-semibold">Durasi</h3>
                    <h1 class=" text-xl font-bold">{{ $this -> quizById -> duration ? $this -> quizById -> duration : '-' }} Menit</h1>
                </div>
            </div>
        </div>

            {{-- <div>
                <h1>Pilih mode pengerjaan</h1>
            </div> --}}

        @if ($this ->latestQuizAttempt == null || $this -> latestQuizAttempt -> status =='done')
            <button wire:click='startQuiz' class=" w-full bg-blue-600 hover:bg-blue-600/80 text-slate-50 font-bold text-lg py-2 rounded-lg">Start</button>

            @else

            `<button wire:click='continouQuiz' class=" w-full bg-blue-600 hover:bg-blue-600/80 text-slate-50 font-bold text-lg py-2 rounded-lg">Lanjutkan</button>
        @endif
    </div>
</section>
