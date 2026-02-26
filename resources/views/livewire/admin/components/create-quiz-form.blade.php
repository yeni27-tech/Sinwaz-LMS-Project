
 <div class=" bg-black/20 h-full w-screen fixed left-0 z-50 top-0 right-0 flex justify-center items-center">
        <div class=" relative min-w-[400px] w-fit h-5/6 p-4 overflow-scroll bg-slate-50 rounded-lg">
            <h1 class=" mb-4 text-xl font-bold ">Tambah Data Quiz</h1>

            <div wire:click='closeCreateQuizForm' class=" hover:cursor-pointer text-slate-900 absolute right-4 top-4">
                x
            </div>

            <form wire:submit='submit' method="post" class=" space-y-2 z-50 ">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="divisi_id" :value="__('Divisi')" />

                    <x-select wire:model="divisi_id" id="divisi_id" name="divisi_id" class=" w-full h-fit text-xs">
                        @foreach ($this -> divisisData as $divisi)
                            <x-option-select value="{{ $divisi->id }}">{{ $divisi->name }}</x-option-select>
                        @endforeach
                    </x-select>

                    <x-input-error :messages="$errors->get('form.divisi_id')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                </div>

                <div class=" flex flex-col gap-2">
                    <x-primary-button  class=" text-sm bg-blue-500 rounded-md min-w-full text-center flex justify-center items-center py-2 font-bold ">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</div>
