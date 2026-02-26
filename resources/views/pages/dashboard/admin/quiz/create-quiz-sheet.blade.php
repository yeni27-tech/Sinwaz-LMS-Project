<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <form action="{{ route('quiz.store') }}" method="post">
        @csrf
        <div class=" flex flex-row items-center justify-between min-w-full px-4 py-2 shadow-sm">
            <a href="{{ route('dashboard.admin.quiz') }}">
                <i class="ph ph-x-circle text-2xl"></i>
            </a>
            <h1 class=" font-bold text-lg">Create New Quiz</h1>
            <button class=" bg-blue-600 text-slate-50 rounded-lg px-3 py-1 text-sm font-semibold ">Continou</button>
        </div>

        <div class=" container max-w-screen-sm mx-auto">
            <div class=" flex flex-col gap-4">
                <div class=" w-full h-[200px] bg-gray-400 rounded-t-xl"></div>
                <div>
                    <x-text-input wire:model="form.name"
                    id="name"
                    class="block mt-1 w-full border-none focus:ring-0 font-bold text-2xl"
                    type="text"
                    name="name"
                    required
                    autocomplete="current-name"
                    placeholder="What is this quiz?"
                    />

                    <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                    </div>

                    <div>
                        <div class=" flex flex-row items-center gap-5">
                            <div class=" flex flex-row items-center gap-1 min-w-[150px]">
                                <i class="ph ph-dots-six-vertical font-bold text-slate-900 text-2xl"></i>
                                <x-input-label for="divisi_id" class=" font-bold text-lg" :value="__('Divisi_id')" />
                            </div>

                            <x-select wire:model="form.divisi_id" id="divisi_id" name="divisi_id" class=" w-fit max-w-[200px] h-fit text-xs">
                                @foreach ($divisisData as $divisi)
                                    <x-option-select value="{{ $divisi->id }}">{{ $divisi->name }}</x-option-select>
                                @endforeach
                            </x-select>
                        </div>

                    {{-- <x-input-error :messages="$errors->get('form.divisi')" class="mt-2" /> --}}
                </div>
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
                    <textarea wire:model="form.description" name="description" id="description" class="w-full h-40 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Type quiz description"></textarea>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
