<?php

namespace App\Repository\Cache;

use App\Contracts\UserRepository;
use App\Models\User;

use function cache;

class CacheUserRepository implements UserRepository
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
