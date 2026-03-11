{{--
 <div class=" bg-black/20 h-full w-screen fixed left-0 z-50 top-0 right-0 flex justify-center items-center">
        <div class=" relative min-w-[400px] w-fit h-fit p-4 bg-slate-50 rounded-lg">
            <h1 class=" mb-4 text-xl font-bold ">Tambah Data Course</h1>

            <div wire:click='closeCreateCourseForm' class=" hover:cursor-pointer text-slate-900 absolute right-4 top-4">
                x
            </div> --}}
            <section>
                <div class="">
                    <iframe width="100%" height="500"
                        src="{{ $this -> yt_video_link }}">
                    </iframe>
                </div>

                <form action="{{ route('material.store') }}" method="post" class=" space-y-2 z-50 ">
                @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="course_id" :value="__('Course')" />

                        <x-select name="course_id"  id="course_id" class=" w-full h-fit text-xs">
                            @foreach ($this -> coursesData as $course)
                                <x-option-select value="{{ $course->id }}">{{ $course->name }}</x-option-select>
                            @endforeach
                        </x-select>

                         <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="yt_video_link" :value="__('Youtube Video Embed link')" />
                        <input wire:change="inputYTVideoLink($event.target.value)" name="yt_video_link" id="yt_video_link" class="w-full  p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Type quiz yt_video_link" value="{{ $this -> yt_video_link }}" />

                        <x-input-error :messages="$errors->get('yt_video_link')" class="mt-2" />
                    </div>

                    <div class=" flex flex-col gap-2">
                        <button
                        class=" text-sm bg-blue-500 rounded-md w-fit text-center flex justify-center items-center py-1.5 mt-2 font-bold text-slate-50 px-4"
                        >Create</button>
                    </div>
                </form>
            </section>
        {{-- </div>
</div> --}}
