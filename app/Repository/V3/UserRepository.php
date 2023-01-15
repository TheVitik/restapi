<?php

namespace App\Repository\V3;

use App\Models\V3\User;

use Throwable;

class UserRepository
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

    /**
     * Find user by name
     *
     * @throws Throwable
     */
    public function findByName(string $name): User
    {
        return User::where('name', $name)->firstOrFail();
    }
}
