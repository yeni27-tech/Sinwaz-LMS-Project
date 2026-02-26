<section class=" w-full flex lg:flex-row flex-col gap-4 h-screen justify-center p-2 bg-slate-50">
    <div class=" flex flex-col gap-3 lg:min-w-[400px] w-full h-[520px]">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/4HrweW4IqJc?si=w67kujAPtm8ANll6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <h1 class=" font-bold text-xl">{{ $this -> materialById -> name }}</h1>
    </div>

    <div class="flex flex-col gap-4">
        <h1 class=" font-bold text-xl">
            Materials
        </h1>

        <div class=" flex flex-col overflow-y-scroll">
            <div class=" lg:w-[250px]">
                @foreach ($this -> materialsData as $material)
                    <livewire:employee.components.cards.material-card :id="$material -> id" />
                @endforeach
            </div>
        </div>
    </div>
</section>
