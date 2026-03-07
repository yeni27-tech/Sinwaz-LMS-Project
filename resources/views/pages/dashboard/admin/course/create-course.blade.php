<x-admin-layout title="Create Course">
    <a href="{{ route('dashboard.admin.course') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Create Course</h1>

        <livewire:admin.components.create-course-form  />
    </div>
</x-admin-layout>
