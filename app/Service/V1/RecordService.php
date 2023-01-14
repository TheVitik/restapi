<?php

namespace App\Service\V1;

use App\Models\Category;
use App\Models\Record;
use App\Models\User;
use App\Repository\CategoryRepository;
use App\Repository\RecordRepository;
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
