<?php

namespace App\Service\V2;

use App\Models\V2\User;
use App\Models\V2\Account;
use App\Repository\Database\DatabaseAccountRepository;
use App\Repository\Database\DatabaseUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserService
{
    private DatabaseUserRepository $repository;
    private DatabaseAccountRepository $accountRepository;

    function __construct(DatabaseUserRepository $repository, DatabaseAccountRepository $accountRepository)
    {
        $this->repository = $repository;
        $this->accountRepository = $accountRepository;
    }

    public function createUser(Request $request): User
    {
        $user = new User($request->all());

        DB::beginTransaction();
        $user = $this->repository->create($user);
        $account = new Account(['user_id' => $user->id]);
        $this->accountRepository->create($account);
        DB::commit();

        return $user;
    }
}
