<?php

namespace App\Service\V2;

use App\Models\V2\Record;
use App\Repository\Database\DatabaseAccountRepository;
use App\Repository\Database\DatabaseRecordRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class RecordService
{
    private DatabaseRecordRepository $repository;
    private DatabaseAccountRepository $accountRepository;

    function __construct(DatabaseRecordRepository $repository, DatabaseAccountRepository $accountRepository)
    {
        $this->repository = $repository;
        $this->accountRepository = $accountRepository;
    }

    public function getRecords(Request $request): Collection
    {
        $userId = $request->get('user_id');
        if ($request->has('category_id')) {
            return $this->repository->allByUserAndCategory($userId, $request->get('category_id'));
        }

        return $this->repository->allByUser($userId);
    }

    public function createRecord(Request $request): Record
    {
        $record = new Record($request->all());

        $account = $this->accountRepository->findByUser($request->get('user_id'));
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
