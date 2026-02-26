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

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisiRequest $request)
    {
        $this->divisiService->postDivisi($request -> toDTO());
    }

    public function show(Divisi $divisi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisiRequest $request, Divisi $divisi)
    {
        $this ->divisiService->putDivisi($divisi['id'],$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
