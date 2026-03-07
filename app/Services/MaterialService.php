<?php

namespace App\Services;

use App\DTO\MaterialRequestDTO;
use App\Interfaces\MaterialRepositoryInterface;
use SweetAlert2\Laravel\Swal;

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

    public function getAllMaterialByCourseId($courseId) {
        try {
            return $this -> materialRepositoryInterface -> findAllMaterialByCourseId($courseId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getMaterialsPagination(string $search = '', int $perPage = 10) {
        try {
            $materials = $this->materialRepositoryInterface->findAllMaterialPagination($search, $perPage);

            return $materials;
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
            $this -> materialRepositoryInterface -> createMaterial($request);

            Swal::success([
                'title' => 'Create Material Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putMaterial($id, MaterialRequestDTO $request) {
        try {
          $this -> materialRepositoryInterface -> updateMaterial($id,$request);

            Swal::success([
                'title' => 'Update Material Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteMaterial($id) {
        try {
            $this -> materialRepositoryInterface -> removeMaterial($id);

              Swal::success([
                'title' => 'Delete Material Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
