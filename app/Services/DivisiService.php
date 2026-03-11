<?php

namespace App\Services;

use App\DTO\DivisiRequestDTO;
use App\Http\Requests\DivisiRequest;
use App\Interfaces\DivisiRepositoryInterface;
use App\Models\Divisi;
use SweetAlert2\Laravel\Swal;

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

    public function getAllDivisiPagination($search = "", $perPage = 10) {
        try {
            return $this -> divisiRepositoryInterface -> findAllDivisiPagination($search,$perPage);
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
                Swal::info([
                    'title' => 'Divisi already exist'
                ]);

                throw new \Exception("Divisi already exist");
            }

            $this -> divisiRepositoryInterface -> createDivisi($request);

            Swal::success([
                'title' => 'Create Divisi Successfully'
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putDivisi($id,DivisiRequestDTO $request) {
        try {
           $this -> divisiRepositoryInterface -> updateDivisi($id, $request);

           Swal::success([
                'title' => 'Update Divisi Successfully'
            ]);

            return redirect() -> route('dashboard.admin.divisi');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteDivisi($id) {
        try {
             $this ->divisiRepositoryInterface -> removeDivisi($id);

             Swal::success([
                'title' => 'Delete Divisi Successfully'
             ]);

             return redirect() -> route('dashboard.admin.divisi');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
