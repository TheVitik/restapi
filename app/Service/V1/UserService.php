<?php

namespace App\Service\V1;

use App\Models\V1\User;
use App\Repository\V1\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    private UserRepository $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createUser(Request $request): User
    {
        $user = new User($request->all());

        return $this->repository->create($user);
    }
}
