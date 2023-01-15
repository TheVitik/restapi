<?php

namespace App\Service\V1;

use App\Models\V1\User;
use App\Repository\Cache\CacheUserRepository;
use Illuminate\Http\Request;

class UserService
{
    private CacheUserRepository $repository;

    function __construct(CacheUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createUser(Request $request): User
    {
        $user = new User($request->all());

        return $this->repository->create($user);
    }
}
