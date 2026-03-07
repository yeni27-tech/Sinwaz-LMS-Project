<div class="max-w-4xl mx-auto py-12 px-6">
    <!-- Quiz Result Header -->
    <div class="text-center mb-12">
        {{-- <h1 class="text-3xl font-bold mb-4">Quiz Results</h1> --}}

        {{-- <!-- Circle Progress (score) -->
        <div class="relative inline-block">
            <!-- Circle background -->
            <svg class="w-40 h-40 transform rotate-90">
                <circle class="text-gray-200" stroke="currentColor" stroke-width="10" fill="none" r="50" cx="50" cy="50" />
                <!-- Circle progress -->
                <circle class="text-blue-500" stroke="currentColor" stroke-width="10" fill="none" r="50" cx="50" cy="50"
                    stroke-dasharray="314.159" stroke-dashoffset="94.247" />
            </svg>
            <!-- Score Text -->
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-3xl font-semibold text-blue-500">7/10</span>
                <p class="text-lg text-gray-600">70%</p>
            </div>
        </div> --}}

        <!-- Feedback Text -->
        <p class="text-blue-500 font-semibold mt-4 text-xl">Good Effort! <span class="text-yellow-500">👍</span></p>
    </div>

    <!-- Stats Breakdown -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-8">
        <div class="text-center bg-white p-6 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
            <div class="text-4xl font-bold text-blue-500">{{ $this -> correctAnswers }}</div>
            <div class="text-sm text-gray-500">Correct</div>
        </div>
        <div class="text-center bg-white p-6 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
            <div class="text-4xl font-bold text-red-500">{{ $this -> quizAttemptById -> quizAttemptAnswer ->count() - $this -> correctAnswers }}</div>
            <div class="text-sm text-gray-500">Wrong</div>
        </div>
        <div class="text-center bg-white p-6 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
            <div class="text-4xl font-bold text-gray-500">{{ $this -> quizAttemptById -> quizAttemptAnswer -> count() }}</div>
            <div class="text-sm text-gray-500">Total Quiz</div>
        </div>
    </div>

    <!-- Question Breakdown -->
    <div class="mt-12 space-y-6">
        <h3 class="text-2xl font-semibold text-gray-800">Question Breakdown</h3>

        @foreach ($this -> quizAttemptById -> quizAttemptAnswer as $data)
            <!-- Question 2 -->
            <div class="bg-slate-50 p-4 rounded-xl shadow-lg flex flex-col gap-4">
                <div class="flex items-start gap-3">
                    <x-icon.check-list-square width="24" height="24" class="text-blue-500" />
                    <span class="text-lg font-semibold text-slate-900">{{ $loop -> iteration }}. {{ $data -> question -> text }}?</span>
                </div>
                <div class="text-sm text-gray-600">Your answer: <span class="{{$data -> answer -> is_correct ? 'text-blue-600' : 'text-red-600'}}">{{ $data -> answer -> text }}</span></div>

                <div class="text-sm text-green-600 {{ $data -> answer -> is_correct ? 'hidden' : 'flex' }}">Correct answer: <span class="font-semibold">Mars</span></div>
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
