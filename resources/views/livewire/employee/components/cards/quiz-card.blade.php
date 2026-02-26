<div class=" rounded-lg shadow-inner bg-slate-50 w-full">
    <div class=" min-h-[120px] max-h-[200px] bg-slate-900 relative">
        <div class=" absolute bottom-0 left-0 text-9xl opacity-35 rotate-12 text-slate-50">
            <i class="ph-bold ph-book"></i>
        </div>
    </div>

    <div class=" p-2 flex flex-col gap-2">
        <div class=" capitalize mt-2 mb-1 bg-gray-200/60 px-3 py-1 w-fit text-xs font-semibold rounded-full">Tech</div>

        <h1 class=" text-md font-bold truncate">
            {{ $this -> quizName }}
        </h1>
        <p class=" text-xs line-clamp-2 text-justify">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus distinctio explicabo aliquid vel veniam consectetur nobis, magni illo dolore blanditiis.
        </p>

         <a href="{{ route('quiz.start.confirmation', ['id' => $this -> quizId]) }}" class=" hover:bg-blue-600/80 py-1 my-3 bg-blue-600 text-slate-50 flex justify-center items-center w-full rounded-md">Start</a>
    </div>


</div>
