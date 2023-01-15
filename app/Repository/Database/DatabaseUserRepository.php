<?php

namespace App\Repository\Database;

use App\Models\V2\User;

use Throwable;

class DatabaseUserRepository
{
    /**
     * Create a new user
     *
     * @throws Throwable
     */
    public function create(User $user): User
    {
        $user->saveOrFail();

        return $user;
    }

    /**
     * Find user by id
     *
     * @throws Throwable
     */
    public function findById(int $id): User
    {
        return User::findOrFail($id);
    }
}
