<div class="max-w-2xl mx-auto py-12 px-6">
    <!-- Quiz Result Header -->
    <div class="text-center mb-12 flex flex-col justify-center items-center">
        <h1 class="text-3xl font-bold mb-4">Quiz Results</h1>
           <!-- Progress Circle -->
    <div class="relative w-40 h-40">
        <svg class="absolute top-0 left-0" width="160" height="160" viewBox="0 0 160 160">
            <!-- Background Circle -->
            <circle cx="80" cy="80" r="70" stroke="#e5e7eb" stroke-width="14" fill="none"/>
            <!-- Foreground Circle (progress) -->
            <circle cx="80" cy="80" r="70" stroke="#3b82f6" stroke-width="14" fill="none" stroke-dasharray="440" stroke-dashoffset="132">
            </circle>
        </svg>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
            <span class="text-3xl font-semibold">{{ $this -> correctAnswers }}/{{ $this -> quizAttemptById -> quizAttemptAnswer -> count()  }}</span>
            <span class="text-blue-500 text-sm">{{ floor($this -> correctAnswers * 100 / $this -> quizAttemptById -> quiz -> question  -> count()) }}%</span>
        </div>
    </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-4xl">

    <!-- Correct -->
    <div class="bg-white border rounded-xl p-6 text-center shadow-sm">
        <div class="flex justify-center mb-3">
            <div class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold text-gray-900">{{ $this -> correctAnswers }}</h2>
        <p class="text-gray-500 mt-1">Correct</p>
    </div>

    <!-- Wrong -->
    <div class="bg-white border rounded-xl p-6 text-center shadow-sm">
        <div class="flex justify-center mb-3">
            <div class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
        </div>
        <h2 class="text-3xl font-bold text-gray-900">{{ $this -> quizAttemptById -> quizAttemptAnswer ->count() - $this -> correctAnswers }}</h2>
        <p class="text-gray-500 mt-1">Wrong</p>
    </div>

    <!-- Skipped -->
    <div class="bg-white border rounded-xl p-6 text-center shadow-sm">
          <div class="flex justify-center mb-3">
            <div class="w-10 h-10 flex items-center justify-center rounded-full border-2 border-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 9h6M9 13h6M9 17h6"/>
                </svg>
            </div>
        </div>

        <h2 class="text-3xl font-bold text-gray-900">{{ $this -> quizAttemptById -> quizAttemptAnswer -> count() }}</h2>
        <p class="text-gray-500 mt-1">Total Quiz</p>
    </div>

</div>
    <!-- Question Breakdown -->
    <div class="mt-12 space-y-6">
        <h3 class="text-2xl font-semibold text-gray-800">Question Breakdown</h3>

        @foreach ($this -> quizAttemptById -> quizAttemptAnswer as $data)
            <!-- Question 2 -->
            <div class="bg-white border rounded-xl p-6 mb-5 flex gap-4 items-start">

                @if (!$data -> answer -> is_correct)
                    <div class="w-7 h-7 flex items-center justify-center rounded-full border-2 border-gray-700 text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>

                    <div>
                        <p class="font-medium">{{ $loop -> iteration }}. {{ $data -> question -> text }}?</p>
                        <p class="text-gray-500 mt-1">Your answer: {{ $data -> answer -> text }}</p>
                        <p class="text-blue-500">Correct: {{ $this -> quizAttemptById -> quizAttemptAnswer[$loop -> index] -> question  -> answer -> where('is_correct', true) -> first() -> text }}</p>
                    </div>

                    @else

                    <div class="w-7 h-7 flex items-center justify-center rounded-full border-2 border-blue-500 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>


                    <div>
                        <p class="font-medium">{{ $loop -> iteration }}. {{ $data -> question -> text }}?</p>
                        <p class="text-blue-500 mt-1">Your answer: {{ $data -> answer -> text }}</p>
                    </div>
                @endif
                </div>
        @endforeach
        <!-- Add more questions similarly... -->
    </div>

    <!-- Result Actions -->
    <div class="flex justify-center gap-6 mt-12">
        {{-- <button class="bg-orange-500 text-white py-3 px-6 rounded-lg text-lg font-semibold transition transform hover:bg-orange-600 hover:scale-105">
            Retry Quiz
        </button> --}}
        <a href="{{ route('employee.home') }}" class="bg-blue-500 text-white py-3 px-6 rounded-lg text-lg font-semibold transition transform hover:bg-blue-600 hover:scale-105">
            Go Home
        </a>
    </div>
</div>
