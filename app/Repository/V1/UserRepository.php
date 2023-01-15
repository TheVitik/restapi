<?php

namespace App\Repository\V1;

use App\Models\V1\User;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

use function cache;

class UserRepository
{
    /**
     * Create a new user
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
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
