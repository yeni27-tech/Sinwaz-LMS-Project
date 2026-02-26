<?php

namespace App\Interfaces;

use App\DTO\MaterialRequestDTO;

interface MaterialRepositoryInterface
{
    public function findMaterialById($materialId);
    public function findMaterials();
    public function findMaterialsWithoutPagination();
    public function createMaterial(MaterialRequestDTO $data);
    public function updateMaterial($id, MaterialRequestDTO $data);
    public function removeMaterial($id);
}
