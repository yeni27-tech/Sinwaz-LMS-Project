<section class=" p-4 space-y-4 ">
    <div class=" flex flex-row items-center justify-between">
        <h1 class=" font-bold text-2xl">Materials</h1>

        <a href="{{ route('dashboard.admin.material.create') }}" class=" bg-blue-500 px-4 py-2 rounded-md text-slate-50 font-bold">Tambah Data</a>
    </div>

    <div class=" grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-4  w-full">
        @forelse ($this -> materialsData as $material)
            <livewire:admin.components.material-card :id="$material -> id" />
        @empty
            <div>
                Materias's data not found
            </div>
        @endforelse
    </div>
</section>
