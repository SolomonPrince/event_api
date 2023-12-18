<?php

namespace App\Services\User;

use App\Data\UserData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /*
     *
     *
    */
    public function store(UserData $dto): User
    {
        return User::create([
            'first_name' => $dto->firstname,
            'last_name' => $dto->lastname,
            'login' => $dto->login,
            'password' => Hash::make($dto->password),
            'birthday' => $dto->birthday,
        ]);
    }

    /*
     *
     *
     *
    */
    public function update(User $user, UserData $dto): User
    {
        return tap($user)->update([
            'first_name' => $dto->firstname,
            'last_name' => $dto->lastname,
            'login' => $dto->login,
            'password' => Hash::make($dto->password),
            'birthday' => $dto->birthday,
        ]);
    }

    /*
    *
    *
    *
    */
    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
