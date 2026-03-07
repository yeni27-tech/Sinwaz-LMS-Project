<form action="{{ route('divisi.store') }}" method="post" class=" space-y-2 z-50 ">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class=" flex flex-col gap-2">
                    <x-primary-button  class=" text-sm bg-blue-500 rounded-md w-fit text-center flex justify-center items-center py-2 font-bold ">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</div>
