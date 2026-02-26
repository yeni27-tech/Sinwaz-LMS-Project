 <section action="{{ route('quiz.store') }}" method="post">
        @csrf
        <div class=" flex flex-row items-center justify-between min-w-full px-4 py-2 shadow-sm">
            <a href="{{ route('dashboard.admin.quiz') }}">
                <i class="ph ph-x-circle text-2xl"></i>
            </a>
            <h1 class=" font-bold text-lg">Quiz Attempt</h1>
            <button class=" bg-blue-600 text-slate-50 rounded-lg px-3 py-1 text-sm font-semibold ">Continou</button>
        </div>

        <div class=" container max-w-screen-sm mx-auto">
            <div class=" flex flex-col gap-2">
                <div class=" w-full h-[200px] bg-gray-400 rounded-t-xl"></div>
                <div>
                    <h1>
                        Testing
                    </h1>

                    <h1
                    class="block mt-1 w-full border-none focus:ring-0 font-bold text-2xl"
                    >Quiz 2</h1>
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
                    <p class="w-full p-2 border rounded-md">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia obcaecati voluptatum ipsa iure culpa ullam consequatur officiis aut, totam sapiente et itaque nihil suscipit perspiciatis nulla repudiandae animi, doloribus hic asperiores eligendi doloremque impedit nostrum quos. Officia quam minus hic qui nesciunt ex repellendus amet sit provident sint incidunt, officiis magni cupiditate neque culpa doloribus rerum veritatis perferendis reiciendis optio eaque iste nisi. Consequatur aliquam nemo aspernatur nesciunt velit, amet fugit iure. Architecto id illum enim quam quibusdam dolorum natus alias facilis quasi quaerat itaque cupiditate explicabo molestiae praesentium possimus sapiente eveniet fugit eaque atque, non ipsa harum necessitatibus. Error.
                    </p>
                </div>
            </div>
        </div>
</section>
