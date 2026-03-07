<x-admin-layout title="Update Job">
    <a href="{{ route('dashboard.admin.job') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Update Job</h1>

        <livewire:admin.components.update-job-form :id="request()->route('id')" lazy />
    </div>
</x-admin-layout>
