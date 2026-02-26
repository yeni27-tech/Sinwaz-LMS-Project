
 <div class=" bg-black/20 h-full w-screen fixed left-0 z-50 top-0 right-0 flex justify-center items-center">
        <div class=" relative min-w-[400px] w-fit h-5/6 overflow-y-scroll p-4 bg-slate-50 rounded-lg">
            <h1 class=" mb-4 text-xl font-bold ">Update Data Job</h1>

            <div wire:click='closeCreateJobForm' class=" hover:cursor-pointer text-slate-900 absolute right-4 top-4">
                x
            </div>

            <form wire:submit='submit' method="post" class=" space-y-2 z-50 ">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="location" :value="__('Location')" />

                    <x-select wire:model="location" id="location" name="location" class=" w-full h-fit text-xs mt-1">
                        <x-option-select value="cirebon" class=" capitalize">Cirebon</x-option-select>
                    </x-select>

                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="type" :value="__('Type')" />

                    <x-select wire:model="type" id="type" name="type" class=" w-full h-fit text-xs mt-1">
                        <x-option-select value="fulltime" class=" capitalize">Fulltime</x-option-select>
                        <x-option-select value="part-time" class=" capitalize">Part-time</x-option-select>
                        <x-option-select value="internship" class=" capitalize">Internship</x-option-select>
                    </x-select>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="education" :value="__('Education')" />

                    <x-select wire:model="education" id="education" name="education" class=" w-full h-fit text-xs mt-1">
                        <x-option-select value="SD" class=" capitalize">SD</x-option-select>
                        <x-option-select value="SMP" class=" capitalize">SMP</x-option-select>
                        <x-option-select value="SMA/SMK" class=" capitalize">SMA/SMK</x-option-select>
                        <x-option-select value="D1/D2/D3/D4" class=" capitalize">D1/D2/D3/D4</x-option-select>
                        <x-option-select value="S1" class=" capitalize">S1</x-option-select>
                        <x-option-select value="S2" class=" capitalize">S2</x-option-select>
                    </x-select>

                    <x-input-error :messages="$errors->get('education')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="experience" :value="__('Experience')" />

                    <x-select wire:model="experience" id="experience" name="experience" class=" w-full h-fit text-xs mt-1">
                        <x-option-select value="< 1 Tahun" class=" capitalize">< 1 Tahun</x-option-select>
                        <x-option-select value="1 - 3 Tahun" class=" capitalize">1 - 3 Tahun</x-option-select>
                        <x-option-select value="3 - 5 Tahun" class=" capitalize">3 - 5 Tahun</x-option-select>
                        <x-option-select value="5 - 7 Tahun" class=" capitalize">5 - 7 Tahun</x-option-select>
                    </x-select>

                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea wire:model="description" name="description" id="description" class="w-full h-40 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Type quiz description">

                    </textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class=" flex flex-col gap-2">
                    <x-primary-button  class=" text-sm bg-blue-500 rounded-md min-w-full text-center flex justify-center items-center py-2 font-bold ">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</div>
