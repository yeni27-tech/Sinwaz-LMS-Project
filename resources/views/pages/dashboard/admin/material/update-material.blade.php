<x-admin-layout title="Update Material">
    <div>
        <h1 class=" font-bold text-2xl  mb-4">Update Material</h1>

        <livewire:admin.components.update-material-form :id="request()->route('id')" lazy />
    </div>
</x-admin-layout>
