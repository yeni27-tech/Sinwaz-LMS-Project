<?php

namespace App\Repositoris;

use App\DTO\DivisiRequestDTO;
use App\Interfaces\DivisiRepositoryInterface;
use App\Models\Divisi;

class DivisiRepository implements DivisiRepositoryInterface
{
   public function findAllDivisis()
   {
        $data = Divisi::lazy();

        return $data;
   }

   public function findAllDivisisWithoutPagination()
   {
        $data = Divisi::get();

        return $data;
   }

   public function findDivisiById($id) {
        $data = Divisi::lazyById($id);

        return $data;
   }

   public function createDivisi(DivisiRequestDTO $request)
   {
        $data = Divisi::create([
            'name' => $request -> name,
        ]);

        return $data;
   }

   public function updateDivisi($id, DivisiRequestDTO $request)
   {
        $data = Divisi::where('id',$id) -> update([
            'name' => $request -> name,
        ]);

        return $data;
   }

   public function removeDivisi($id)
   {
    $data = Divisi::where('id',$id) -> delete();

    return $data;
   }
}
