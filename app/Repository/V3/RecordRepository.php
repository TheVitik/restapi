<?php

namespace App\Repository\V3;

use App\Models\V2\Record;
use Illuminate\Database\Eloquent\Collection;

class RecordRepository
{
    /**
     * Create a new record
     *
     * @throws \Throwable
     */
    public function create(Record $record): Record
    {
        $record->saveOrFail();

        return $record;
    }

    /**
     * Get all records by user id
     */
    public function allByUser(int $userId): Collection
    {
        return Record::where('user_id', $userId)
            ->latest()
            ->get();
    }

    public function allByUserAndCategory(int $userId, int $categoryId): Collection
    {
        return Record::where('user_id', $userId)
            ->where('category_id', $categoryId)
            ->latest()
            ->get();
    }

}
