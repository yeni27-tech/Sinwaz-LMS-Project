<?php

namespace App\Interfaces;

use App\DTO\DivisiRequestDTO;

interface DivisiRepositoryInterface
{
    public function findAllDivisis();
    public function findAllDivisisWithoutPagination();
    public function findDivisiById($id);
    public function createDivisi(DivisiRequestDTO $request);
    public function updateDivisi($id, DivisiRequestDTO $request);
    public function removeDivisi($id);

}
