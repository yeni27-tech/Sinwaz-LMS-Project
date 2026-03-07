<x-admin-layout title="Create User">
    <a href="{{ route('dashboard.admin.user') }}" class=" mb-4 flex flex-row items-center  gap-2">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div>
        <h1 class=" font-bold text-2xl  mb-4">Create User</h1>

        <livewire:admin.components.create-user-form :showCreateUserForm="false" />
    </div>
</x-admin-layout>
