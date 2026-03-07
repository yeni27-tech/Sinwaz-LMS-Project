<?php

namespace App\Livewire\Admin;

use App\Services\DivisiService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class DivisiPage extends Component
{
    use WithPagination;
    use WithSweetAlert;
    public $id;
    public $name;
    public $description;
    public $tutor_id;
    public $divisi_id;
    public bool $showCreateDivisiForm = false;
    public bool $showUpdateDivisiForm = false;


    #[Url(as: 'search', except: '')]
    public string $search = '';

    public int $perPage = 10;

    public function placeholder() {
        return view('components.loading');
    }

    public function divisiService() {
        return app(DivisiService::class);
    }
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function divisiPagination()
    {
        $divisiService = app(DivisiService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $divisiService->getAllDivisiPagination($this-> search, $this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.divisi-page');
    }
}
