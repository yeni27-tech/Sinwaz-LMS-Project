<section class=" p-4 space-y-4 ">
    <h1 class=" font-bold text-2xl">Materials</h1>

    <div class=" grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-4  w-full">
        @forelse ($this -> materialsData as $material)
            <livewire:employee.components.cards.material-card :id="$material -> id" />
        @empty
            <div>
                Materias's data not found
            </div>
        @endforelse
    </div>
</section>
