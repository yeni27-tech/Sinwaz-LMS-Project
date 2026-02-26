@extends('layouts.admin')

@section('content')
{{--     <div class="p-6">
        <h1 class="text-xl font-semibold mb-4">Data Material</h1>
        <form action="{{ route('material.store') }}" method="post">
            @csrf
             <input type="text" name="material_maker_id" value="{{ Auth::user() -> id }}" placeholder="name" id="">
            <div class="mt-4">
                <x-input-label for="name" :value="__('name')" />

                <x-text-input wire:model="name" id="name" class="block mt-1 w-full"
                                type="text"
                                name="name"
                                required autocomplete="current-name" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="course_id" :value="__('course_id')" />

                <select name="course_id" id="course_id">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label for="yt_video_link" :value="__('yt_video_link')" />

                <x-text-input wire:model="yt_video_link" id="yt_video_link" class="block mt-1 w-full"
                                type="text"
                                name="yt_video_link"
                                required autocomplete="current-yt_video_link" />

                <x-input-error :messages="$errors->get('yt_video_link')" class="mt-2" />
            </div>

            <button type="submit">Submit</button>
        </form>
    </div> --}}

        <div class="p-6">
        <h1 class="text-xl font-semibold mb-4">Update Data Material</h1>

            <form action="{{ route('material.destroy', ['id' => 2]) }}" method="post">
            @csrf
            @method('delete')

            <button type="submit">Delete</button>
    </form>

        <form action="{{ route('material.update' , ['id' => 1]) }}" method="post">
            @csrf
            @method('put')
            {{-- <input type="text" name="material_maker_id" value="{{ Auth::user() -> id }}" placeholder="name" id=""> --}}
        <div class="mt-4">
            <x-input-label for="name" :value="__('name')" />

            <x-text-input wire:model="name" id="name" class="block mt-1 w-full"
                            type="text"
                            name="name"
                            required autocomplete="current-name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="course_id" :value="__('course_id')" />

            <x-text-input wire:model="course_id" id="course_id" class="block mt-1 w-full"
                            type="text"
                            name="course_id"
                            required autocomplete="current-descrption" />

            <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="yt_video_link" :value="__('yt_video_link')" />

            <x-text-input wire:model="yt_video_link" id="yt_video_link" class="block mt-1 w-full"
                            type="text"
                            name="yt_video_link"
                            required autocomplete="current-yt_video_link" />

            <x-input-error :messages="$errors->get('yt_video_link')" class="mt-2" />
        </div>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
