<?php

namespace App\Service\V1;

use App\Models\V1\Record;
use App\Repository\Cache\CacheRecordRepository;
use Illuminate\Http\Request;

class RecordService
{
    private CacheRecordRepository $repository;

    function __construct(CacheRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getRecords(Request $request): array
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

        return $this->repository->create($record);
    }

}
