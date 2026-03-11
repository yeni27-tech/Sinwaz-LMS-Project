<x-admin-layout title="Update Course">
    <a href="{{ route('dashboard.admin.course') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Update Course</h1>

        <livewire:admin.components.update-course-form :id="request()->route('id')" lazy />
    </div>
</x-admin-layout>
