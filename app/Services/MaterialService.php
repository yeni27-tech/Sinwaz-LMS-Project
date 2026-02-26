<?php

namespace App\Services;

use App\DTO\MaterialRequestDTO;
use App\Interfaces\MaterialRepositoryInterface;

class MaterialService
{
    public MaterialRepositoryInterface $materialRepositoryInterface;
    public function __construct(MaterialRepositoryInterface $materialRepositoryInterface)
    {
        $this->materialRepositoryInterface = $materialRepositoryInterface;
    }

    public function getMaterials(){
        try {
            return $this -> materialRepositoryInterface -> findMaterials();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getMaterialsWithoutPagination(){
        try {
            return $this -> materialRepositoryInterface -> findMaterialsWithoutPagination();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getMaterialById($id) {
        try {
            return $this -> materialRepositoryInterface -> findMaterialById($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postMaterial(MaterialRequestDTO $request) {
        try {
            return $this -> materialRepositoryInterface -> createMaterial($request);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putMaterial($id, MaterialRequestDTO $request) {
        try {
          return  $this -> materialRepositoryInterface -> updateMaterial($id,$request);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteMaterial($id) {
        try {
            $this -> materialRepositoryInterface -> removeMaterial($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
