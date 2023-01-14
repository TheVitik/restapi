<?php

namespace App\Service\V1;

use App\Contracts\UserRepository;
use App\Models\User;
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
