<?php

namespace App\Repository\V3;

use App\Models\V2\Account;

use Illuminate\Database\Eloquent\Collection;
use Throwable;

class AccountRepository
{
    /**
     * Create a new account
     *
     * @throws Throwable
     */
    public function create(Account $account): Account
    {
        $account->saveOrFail();

        return $account;
    }

    /**
     * Find account by id
     */
    public function findById(int $id): Account
    {
        return Account::findOrFail($id);
    }

    /**
     * Find account by user id
     */
    public function findByUser(int $userId): Account
    {
        return Account::where('user_id', $userId)->firstOrFail();
    }

    /**
     * Get all accounts
     */
    public function all(): Collection
    {
        return Account::all();
    }

    /**
     * Update account balance
     *
     * @throws Throwable
     */
    public function update(Account $account)
    {
        $account->saveOrFail();
    }
}
