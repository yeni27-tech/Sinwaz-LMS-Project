<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisiRequest;
use App\Models\Divisi;
use App\Services\DivisiService;

class TestController extends Controller
{
    public function __construct(public DivisiService $divisiService) {
    }
    public function index() {
        $allDivisi = $this->divisiService->getDivisis();

        return view("livewire.pages.testing.tes-page", compact("allDivisi"));
    }

    public function show($id) {
        $divisiData = $this->divisiService->getDivisi($id);

        $courseData = $divisiData -> course() -> id;
        // dd($courseData);

        // return view('livewire.pages.testing.tes-detail-page', compact('divisiData'));
    }

    public function create() {
        return view('livewire.pages.testing.tes-create-page');
    }

    public function store(DivisiRequest  $request) {
        $this->divisiService->postDivisi($request->toDTO());
    }

    public function update(DivisiRequest $request, $id)
    {
        $this ->divisiService->putDivisi($id,$request);
    }

    public function edit($id) {
        $divisiData = $this->divisiService->getDivisi($id);

        // dd($divisiData);

        return view('livewire.pages.testing.tes-update-page', compact('divisiData'));
    }

}
