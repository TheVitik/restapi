<?php

namespace App\Service\V3;

use App\Models\V2\Account;
use App\Models\V3\User;
use App\Repository\V3\AccountRepository;
use App\Repository\V3\UserRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class AuthService
{
    private UserRepository $repository;
    private AccountRepository $accountRepository;

    function __construct(UserRepository $repository, AccountRepository $accountRepository)
    {
        $this->repository = $repository;
        $this->accountRepository = $accountRepository;
    }

    /**
     * @throws Throwable
     */
    public function register(Request $request): User
    {
        $user = new User($request->all());

        DB::beginTransaction();
        $user = $this->repository->create($user);
        $account = new Account(['user_id' => $user->id]);
        $this->accountRepository->create($account);
        DB::commit();

        return $user;
    }

    /**
     * @throws AuthorizationException|Throwable
     */
    public function login(Request $request): User
    {
        if (! Auth::attempt($request->only('name', 'password'))) {
            throw new AuthorizationException('Incorrect name or password');
        }

        $user = $this->repository->findByName($request->get('name'));
        $user->tokens()->delete();

        return $user;
    }
}
