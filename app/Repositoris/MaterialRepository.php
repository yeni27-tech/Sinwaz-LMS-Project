<?php

namespace App\Repositoris;

use App\DTO\MaterialRequestDTO;
use App\Interfaces\MaterialRepositoryInterface;
use App\Models\Material;

class MaterialRepository implements MaterialRepositoryInterface
{
    public function findMaterials()
    {
        return Material::lazy();
    }

    public function findMaterialsWithoutPagination() {
        return Material::get();
    }

    public function findMaterialById($materialId)
    {
        return Material::where('id', $materialId) -> first();
    }

    public function createMaterial(MaterialRequestDTO $request)
    {
        return Material::create([
            'name' => $request -> name,
            'yt_video_link' => $request -> yt_video_link,
            'course_id' => $request -> course_id,
        ]);
    }

    public function updateMaterial($id, MaterialRequestDTO $request)
    {
        return Material::where('id', $id)->update([
            'course_id' => $request -> course_id,
            'name' => $request -> name,
            'yt_video_link' => $request -> yt_video_link,
        ]);
    }

    public function removeMaterial($id)
    {
        return Material::where('id', $id)->delete();
    }
}
