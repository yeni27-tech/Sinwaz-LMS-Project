<main class="h-screen  flex flex-row items-center">
       <aside class=" h-screen min-w-[250px] overflow-y-scroll w-fit bg-gray-100 p-3">
            <div class=" flex flex-row items-center justify-between mb-4">
                <h1 class=" font-bold uppercase text-sm">
                    Questions
                </h1>

                <button wire:click.prevent="createQuestion({{ $quizById -> id}})">
                    <x-icon.plus :width="14" height="14" />
                </button>
            </div>

            <div class=" flex flex-col gap-4">
                @foreach ($quizById -> question as $question)
                    <div class=" bg-gray-200 border border-gray-900 shadow-inner py-3 px-5 rounded-lg flex flex-col gap-2">
                        <div class=" flex flex-row items-center justify-between gap-2">
                            <div class=" flex flex-row items-center gap-2 w-11/12">
                                <h1 class=" bg-gray-100 text-slate-500 font-bold flex justify-center items-center w-[35px] text-sm h-[30px] rounded-full">{{ $loop -> iteration }}</h1>

                                <h3 class=" text-sm font-semibold line-clamp-1 truncate">{{ $question -> text }}</h3>
                            </div>

                            <button wire:click.prevent="deleteQuestionById({{ $question -> id }})" class="">
                                <x-icon.trash :width="18" height="18" />
                            </button>
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
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class=" flex flex-col gap-4">


                <form action="" wire:submit='putQuiz({{ $quizById -> id }})' class=" rounded-lg border border-slate-900 p-4 flex flex-col gap-4">
                    <div class=" flex flex-row items-center justify-between">
                        <div>
                            <h1 class=" font-bold text-2xl">Quiz Data</h1>
                            <p class=" text-xs text-light">Update quiz data di sini</p>
                        </div>

                        <button class=" px-4 py-2 bg-blue-600 rounded-md font-bold text-slate-50">
                            {{-- {{  }} --}}
                        </button>
                    </div>
                    {{-- questions --}}
                    <div class=" flex flex-col gap-2 w-full min-w-full">
                        <div class=" flex flex-row items-center gap-2">
                            <h1 class=" font-bold text-sm">Name</h1>
                        </div>

                        <x-text-input wire:keydown.enter.prevent="" value="{{ $quizById -> name }}" type="text" class="outline-1" wire:model="name" />
                    </div>

                            <div class=" flex flex-col gap-5">
                                <div class=" flex flex-row gap-1 min-w-[150px]">
                                    <i class="ph ph-dots-six-vertical font-bold text-slate-900 text-2xl"></i>
                                    <x-input-label for="divisi_id" class=" font-bold text-lg" :value="__('Divisi_id')" />
                                </div>

                                <x-select wire:model="form.divisi_id" id="divisi_id" name="divisi_id" class=" w-fit h-fit text-xs">
                                    @foreach ($this -> divisisData as $divisi)
                                        <x-option-select value="{{ $divisi->id }}">{{ $divisi->name }}</x-option-select>
                                    @endforeach
                                </x-select>
                            </div>

                        {{-- <x-input-error :messages="$errors->get('form.divisi')" class="mt-2" /> --}}
    {{--
                    <div>
                        <div class=" flex flex-row items-center gap-5">
                            <div class=" flex flex-row items-center gap-2 min-w-[150px]">
                                <i class="ph ph-clock font-bold text-slate-900 text-xl"></i>
                                <x-input-label for="duration" class=" font-bold text-lg" :value="__('Estimasi Waktu')" />
                            </div>

                            <x-select wire:model="form.duration" id="duration" name="duration" class=" w-fit h-fit text-xs">
                                <x-option-select value="1">1 hour</x-option-select>
                                <x-option-select value="2">2 hours</x-option-select>
                            </x-select>
                        </div>
                    </div> --}}

                    <div>
                        <textarea wire:model="description" name="description" id="description" class="w-full h-40 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Type quiz description">{{ $quizById -> description }}</textarea>
                    </div>

                    <button type="submit" class="w-fit bg-blue-600 text-slate-50 px-3 py-2 font-bold text-sm rounded-md">Save</button>
                </form>

                @foreach ($quizById -> question as $question)
                    <div wire:key="question-{{ $question -> id }}" class=" rounded-lg border border-slate-900 p-4 flex">
                        <div class=" justify-end flex">

                        </div>

                        <div class=" flex flex-col gap-4 w-full min-w-full">
                            {{-- questions --}}
                            <div class=" flex flex-col gap-2 w-full min-w-full">
                                <div class=" flex flex-row items-center gap-2">
                                    <div class=" px-3 py-1 w-fit rounded-lg bg-slate-900 text-slate-50 font-bold text-sm">?</div>

                                    <h1 class=" font-bold text-sm">Question {{ $loop -> iteration  }}</h1>
                                </div>

                                <x-text-input wire:keydown.enter.prevent='inputQuestionText({{ $question -> id }})' value="{{ $question -> text }}" type="text" class="outline-1" wire:model.defer="questions.{{ $question->id }}"  />
                            </div>

                            {{-- choices --}}

                            <div>
                                <h3 class="text-sm font-semibold mb-6 text-slate-700 tracking-wide">Choices</h3>

                                <form id="quizForm" class="space-y-5">
                                    @foreach ($question -> answer as $answer)
                                        <div wire:key="answer-{{ $answer -> id }}" class="flex items-center gap-5 group cursor-pointer">
                                            <div  class=" w-full flex flex-row items-center gap-3">
                                                <button type="button" wire:click="pickCorrectAnswer({{ $answer->id }}, {{ $answer -> question_id }})" >
                                                    <input  @checked($answer->is_correct) type="radio" name="lms_option" value="{{ $answer -> name }}" class="w-7 h-7 z-50 border-2 border-blue-500 rounded-full appearance-none checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition-all cursor-pointer ring-offset-2 focus:ring-2 focus:ring-blue-300">
                                                </button>

                                                <input wire:key="answer-{{ $answer->id }}" wire:keydown.enter.prevent="inputAnswerText({{ $answer -> id }})" wire:model.defer="answers.{{ $answer->id }}"
                                                  type="text" value="{{ $answer -> text }}"  class="bg-gray-100 px-6 w-full py-3 rounded-lg text-slate-700 font-medium group-hover:bg-blue-50 group-hover:text-blue-700 border border-transparent group-hover:border-blue-200 transition-all flex-1" />
                                            </div>

                                            <button type="button" wire:click.prevent="deleteAnswer({{ $answer -> id }})" class=" z-50">
                                                <x-icon.trash :width="17" height="17" />
                                            </button>
                                        </div>
                                    @endforeach

                                       <button type="button" wire:click.prevent="createAnswer({{ $question -> id}})" class=" text-sm flex flex-row items-center gap-2">
                                            <x-icon.plus :width="10" height="10" />

                                            <h1>
                                                Add Answer
                                            </h1>
                                        </button>

                                    <div class="mt-8 p-4 bg-slate-50 rounded-lg border border-slate-200">
                                        <p class="text-sm text-slate-500">Jawaban Benar: <span id="selectedDisplay" class="font-bold text-blue-600">Belum memilih</span></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
