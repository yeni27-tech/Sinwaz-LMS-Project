<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisiRequest;
use App\Models\Divisi;
use App\Services\DivisiService;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public DivisiService $divisiService;
    public function __construct( DivisiService $divisiService) {
        $this->divisiService = $divisiService;
    }
    public function index() {
        $allDivisi = $this->divisiService->getDivisis();

        return view("livewire.pages.tesPage", compact("allDivisi"));
    }

    public function adminDashboard() {
        return view('pages.dashboard.admin.divisi');
    }
    public function create()
    {
        return view('pages.dashboard.admin.divisi.create-divisi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisiRequest $request)
    {
        $this->divisiService->postDivisi($request -> toDTO());
    }

    public function edit($id)
    {
        return view('pages.dashboard.admin.divisi.update-divisi');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, DivisiRequest $request)
    {
       return $this ->divisiService-> putDivisi($id,$request -> toDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this -> divisiService -> deleteDivisi($id);
    }
}
