<?php

namespace App\Services;

use App\DTO\DivisiRequestDTO;
use App\Http\Requests\DivisiRequest;
use App\Interfaces\DivisiRepositoryInterface;
use App\Models\Divisi;

class DivisiService
{
    public $divisiRepositoryInterface;
    public function __construct(DivisiRepositoryInterface $divisiRepositoryInterface) {
        $this->divisiRepositoryInterface = $divisiRepositoryInterface;
    }

    public function getDivisis() {
        try {
            return $this->divisiRepositoryInterface -> findAllDivisisWithoutPagination();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getDivisisWithoutPagination() {
        try {
            //code...
        return $this->divisiRepositoryInterface -> findAllDivisisWithoutPagination();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getDivisi($id) {
        try {
            return $this->divisiRepositoryInterface -> findDivisiById($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postDivisi (DivisiRequestDTO $request) {
        try {
            $divisiExist = Divisi::where("name", $request -> name)->lazy();

            if($divisiExist -> count() > 0) {
                throw new \Exception("Divisi already exist");
            }

            return $this -> divisiRepositoryInterface -> createDivisi($request);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putDivisi($id,DivisiRequest $request) {
        try {
           return $this -> divisiRepositoryInterface -> updateDivisi($id, $request -> toDTO());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteDivisi($id) {
        try {
            return $this ->divisiRepositoryInterface -> removeDivisi($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
