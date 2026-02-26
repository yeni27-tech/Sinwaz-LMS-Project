<main class="h-screen  flex flex-row items-center">
       <aside class=" h-screen min-w-[250px] overflow-y-scroll w-fit bg-gray-100 p-3">
            <div class=" flex flex-row items-center justify-between mb-4">
                <h1 class=" font-bold uppercase text-sm">
                    Questions
                </h1>


            </div>

            <div class=" flex flex-col gap-4">
                @foreach ($quizAttemptById -> quiz -> question as $question)
                    <div class=" bg-gray-200 border border-gray-900 shadow-inner py-3 px-5 rounded-lg flex flex-col gap-2">
                        <div class=" flex flex-row items-center justify-between gap-2">
                            <div class=" flex flex-row items-center gap-2 w-11/12">
                                <h1 class=" bg-gray-100 text-slate-500 font-bold flex justify-center items-center w-[35px] text-sm h-[30px] rounded-full">{{ $loop -> iteration }}</h1>

                                <h3 class=" text-sm font-semibold line-clamp-1 truncate">{{ $question -> text }}</h3>
                            </div>
                        </div>

                        <div class=" flex flex-row items-center gap-2 text-sm bg-slate-200 font-bold px-2 py-1 rounded-2xl w-fit">
                            <x-icon.check-list-square :width="18" height="18" class=" w-10 h-10" />

                            <h1 class=" text-xs">Multiple Answers</h1>
                        </div>
                    </div>
                @endforeach
            </div>
       </aside>

       <section class=" w-full h-screen min-h-screen max-h-screen overflow-y-scroll p-5">
               {{-- Optional: Display flash messages --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class=" flex flex-col gap-4">
                @foreach ($quizAttemptById -> quiz -> question as $question)
                    <div wire:key="question-{{ $question -> id }}" class=" rounded-lg border border-slate-900 p-4 flex">
                        <div class=" justify-end flex">

                        </div>

                        <div class=" flex flex-col gap-4 w-full min-w-full">
                            {{-- questions --}}
                            <div class=" flex flex-col gap-2 w-full min-w-full">
                                <div class=" flex flex-row items-center gap-2">
                                    <div class=" px-3 py-1 w-fit rounded-lg bg-slate-900 text-slate-50 font-bold text-sm">?</div>

                                    <h1 class=" font-bold text-sm">{{ $question -> text}}</h1>
                                </div>
                            </div>

                            {{-- choices --}}

                            <div>
                                <h3 class="text-sm font-semibold mb-6 text-slate-700 tracking-wide">Choices</h3>

                                <form id="quizForm" class="space-y-5">
                                    @foreach ($question -> answer as $answer)
                                        <div wire:key="answer-{{ $answer -> id }}" class="flex items-center gap-5 group cursor-pointer">
                                            <div  class=" w-full flex flex-row items-center gap-3">
                                                @if ($quizAttemptById -> status == 'in_progress')
                                                <button type="button" wire:click='pickAnswer({{ $answer -> id }}, {{ $answer -> question_id }})'>
                                                        <input @checked( $answer -> quizAttemptAnswer() -> count() === 1 ? true : false )  type="radio" name="lms_option" value="{{ $answer -> text }}" class="w-7 h-7 border-2 border-blue-500 rounded-full appearance-none checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition-all cursor-pointer ring-offset-2 focus:ring-2 focus:ring-blue-300"
                                                            >
                                                        </button>
                                                    @endif
{{--
                                                    <input disabled @checked( $answer -> quizAttemptAnswer() -> count() === 1 ? true : false )  type="radio" name="lms_option" value="{{ $answer -> text }}" class="w-7 h-7 border-2 border-blue-500 rounded-full appearance-none checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition-all cursor-pointer ring-offset-2 focus:ring-2 focus:ring-blue-300"
                                                    > --}}

                                                    <div class="w-7 h-7 border-2 border-blue-500 rounded-full appearance-none focus:outline-none transition-all cursor-pointer ring-offset-2 focus:ring-2 focus:ring-blue-300 ring-blue-300 {{ $answer -> is_correct ? 'bg-blue-600 border-blue-600 p-[6.5px]' : '' }}">
                                                        <div class=" bg-slate-50 ring-blue-300 w-full/12 h-full rounded-full"></div>
                                                    </div>

                                                <h1   class="bg-gray-100 px-6 w-full py-3 rounded-lg text-slate-700 font-medium group-hover:bg-blue-50 group-hover:text-blue-700 border border-transparent group-hover:border-blue-200 transition-all flex-1" />
                                                    {{ $answer -> text }}
                                                </h1>
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($quizAttemptById -> status == 'in_progress')
                @if ($quizAttemptAnswers -> count() == $quizAttemptById -> quiz -> question  -> count())
                <button wire:click.prevent="submitQuiz"  type="button" class="  text-slate-50 font-bold my-5 px-3 py-1 text-sm hover:cursor-pointer bg-blue-500 ">Submit</button>

                @else

                <button onclick="alert('tes')" disabled  type="button" class="  text-slate-50 font-bold my-5 px-3 py-1 text-sm hover:cursor-pointer bg-blue-300">Submit</button>
                @endif
            @endif
        </section>
</main>

<script>
  // Script untuk mendeteksi pilihan secara real-time
  const radioButtons = document.querySelectorAll('input[name="lms_option"]');
  const display = document.getElementById('selectedDisplay');

  radioButtons.forEach(button => {
     if (button.checked) {
        display.innerText =  button.value;
      }

    button.addEventListener('change', () => {
      if (button.checked) {
        display.innerText =  button.value;
      }
    });
  });
</script>
