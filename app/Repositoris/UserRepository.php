<?php

namespace App\Repositoris;

use App\DTO\UserRequestDTO;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
   public function findAllUser()
   {
        $data = User::all();

        return $data;
   }

     public function findAllUserPagination(string $search = '', int $perPage = 10)
    {
        return User::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage);
    }

   public function findAllUserWithoutPagination()
   {
        return User::get();
   }

   public function createUser(UserRequestDTO $request)
   {
        $newUser = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
            'divisi_id' => $request -> divisiId,
            'number_phone' => $request -> numberPhone,
        ]);

        return $newUser;
   }

   public function updateUser($id, UserRequestDTO $request)
   {
        return User::where('id',$id) -> update([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
            'divisi_id' => $request -> divisiId,
            'number_phone' => $request -> numberPhone,
        ]);
   }

   public function removeUser($id)
   {
        return User::where('id',$id) -> delete();
   }
}
