<x-admin-layout title="Update User">
    <a href="{{ route('dashboard.admin.user') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Update User</h1>

        <livewire:admin.components.update-user-form :id="request()->route('id')" lazy />
    </div>
</x-admin-layout>
