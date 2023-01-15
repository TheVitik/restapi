<?php

namespace App\Service\V3;

use App\Models\V2\Record;
use App\Repository\V2\AccountRepository;
use App\Repository\V2\RecordRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class RecordService
{
    private RecordRepository $repository;
    private AccountRepository $accountRepository;

    function __construct(RecordRepository $repository, AccountRepository $accountRepository)
    {
        $this->repository = $repository;
        $this->accountRepository = $accountRepository;
    }

    public function getRecords(Request $request): Collection
    {
        if ($request->has('category_id')) {
            return $this->repository->allByUserAndCategory(auth()->id(), $request->get('category_id'));
        }

        return $this->repository->allByUser(auth()->id());
    }

    public function createRecord(Request $request): Record
    {
        $record = new Record($request->all());
        $record->user_id = auth()->id();

        $account = $this->accountRepository->findByUser(auth()->id());
        if ((int)$request->get('sum') > $account->balance) {
            throw new InvalidArgumentException('You have no enough money to make a record');
        }

        $account->changeBalance(-$request->get('sum'));

        DB::beginTransaction();
        $record = $this->repository->create($record);
        $this->accountRepository->update($account);
        DB::commit();

        return $record;
    }

}
