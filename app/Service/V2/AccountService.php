<?php

namespace App\Service\V2;

use App\Models\V2\Account;
use App\Repository\Database\DatabaseAccountRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AccountService
{
    private DatabaseAccountRepository $repository;

    function __construct(DatabaseAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAccounts(): Collection
    {
        return $this->repository->all();
    }

    public function createAccount(Request $request): Account
    {
        $account = new Account($request->all());

        return $this->repository->create($account);
    }

    public function deposit(Request $request, int $id): Account
    {
        $record = $this->repository->findById($id);
        $record->changeBalance($request->get('sum'));

        $this->repository->update($record);

        return $record;
    }
}
