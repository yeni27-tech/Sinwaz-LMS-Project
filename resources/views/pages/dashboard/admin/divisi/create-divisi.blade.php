<x-admin-layout title="Create Course">
    <a href="{{ route('dashboard.admin.divisi') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Create Divisi</h1>

        <livewire:admin.components.create-divisi-form  />
    </div>
</x-admin-layout>
