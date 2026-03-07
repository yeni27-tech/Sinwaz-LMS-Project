<?php

namespace App\Livewire\Admin;

use App\Services\DivisiService;
use App\Services\MaterialService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class MaterialPage extends Component
{
    use WithPagination;
    use WithSweetAlert;
    public $course_id;
    public $id;
    public $name;
    public $yt_video_link;
    public bool $showCreateUserForm = false;
    public bool $showUpdateUserForm = false;


    #[Url(as: 'search', except: '')]
    public string $search = '';

    public int $perPage = 10;

    public function placeholder() {
        return view('components.loading');
    }
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function materials()
    {
        $materialService = app(MaterialService::class);

        // Pastikan getmaterials menerima search/perPage biar rapi (lihat service di bawah)
        return $materialService->getMaterialsPagination();
    }


    #[Computed]
    public function divisisData() {
        $divisiService = app(DivisiService::class);

        return $divisiService -> getDivisisWithoutPagination();
    }

    #[Computed]
    public function materialsPagination()
    {
        $materialService = app(MaterialService::class);

        // Pastikan getmaterials menerima search/perPage biar rapi (lihat service di bawah)
        return $materialService->getMaterialsPagination($this-> search, $this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.material-page');
    }
}
