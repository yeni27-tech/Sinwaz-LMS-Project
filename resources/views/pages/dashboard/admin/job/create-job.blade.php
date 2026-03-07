<x-admin-layout title="Create Job">
    <a href="{{ route('dashboard.admin.job') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Create Job</h1>

        <livewire:admin.components.create-job-form   />
    </div>
</x-admin-layout>
