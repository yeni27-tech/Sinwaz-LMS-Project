 <div class=" bg-black/20 h-screen w-screen fixed left-0 z-50 top-0 right-0 flex justify-center items-center">
        <div class=" relative min-w-[400px] w-fit min-h-11/12 h-fit p-4 z-50 overscroll-y-scroll bg-slate-50 rounded-lg">
            <h1 class=" mb-4 text-xl font-bold">Update Data User</h1>

            <div wire:click='closeUpdateUserForm' class=" hover:cursor-pointer text-slate-900 absolute right-4 top-4">
                x
            </div>

            <form wire:submit='submit({{ $this -> id }})' method="post" class=" space-y-2">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="name" id="name" value="{{ $this -> name }}" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-input-label for="number_phone" :value="__('Number Phone')" />
                    <x-text-input wire:model="number_phone" id="number_phone" class="block mt-1 w-full" type="text" name="number_phone" required autocomplete="number_phone" placeholder="08xxxxxxxxxx" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                    <x-input-error :messages="$errors->get('number_phone')" class="mt-2" />
                </div>


                <div class=" grid grid-cols-2 gap-2">
                    <div>
                        <x-input-label for="divisi_id" :value="__('Divisi')" />
                        <x-select wire:model="divisi_id" id="divisi_id" name="divisi_id" class=" w-full h-fit text-xs">
                            @foreach ($this -> divisisData as $divisi)
                            <x-option-select value="{{ $divisi->id }}">{{ $divisi->name }}</x-option-select>
                            @endforeach
                        </x-select>

                        <x-input-error :messages="$errors->get('divisi_id')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="role" :value="__('Role')" />
                            <x-select wire:model="role" id="role" name="role" class=" w-full h-fit text-xs">
                                    <x-option-select value="umum" class=" capitalize">umum</x-option-select>
                                    <x-option-select value="employee" class=" capitalize">employee</x-option-select>
                                    <x-option-select value="admin" class=" capitalize">admin</x-option-select>
                        </x-select>

                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
                </div>

                        <div class="mt-2">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                                            type="text"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        {{--<div class="mt-2">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div> --}}

            </form>

                <div class=" flex flex-col gap-2">
                    <x-primary-button  class=" text-sm bg-blue-500 rounded-md min-w-full text-center flex justify-center items-center py-2 font-bold ">
                         {{ __(key: 'Save') }}
                    </x-primary-button>
                </div>
        </div>
</div>


