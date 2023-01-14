<?php

namespace App\Service\V1;

use App\Contracts\RecordRepository;
use App\Models\Record;
use App\Repository\Cache\CacheRecordRepository;
use Illuminate\Http\Request;

class RecordService
{
    private RecordRepository $repository;

    function __construct(RecordRepository $repository)
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
