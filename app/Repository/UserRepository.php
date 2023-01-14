<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    /**
     * Create a new user
     *
     * @param User $user
     */
    public function create(User $user): User
    {
        $users = [];
        if (cache()->has('users')) {
            $users = cache()->get('users');
        }
        $user->id = count($users) + 1;
        $users[] = $user;
        cache()->put('users', $users);

        return $user;
    }

}
