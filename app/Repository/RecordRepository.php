<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Record;

class RecordRepository
{
    /**
     * Create a new user
     *
     * @param Record $record
     */
    public function create(Record $record): Record
    {
        $records = [];
        if (cache()->has('records')) {
            $records = cache()->get('records');
        }
        $record->id = count($records) + 1;
        $record->created_at = now();
        $records[] = $record;
        cache()->put('records', $records);

        return $record;
    }

    public function allByUser(int $userId): array
    {
        $result = [];
        if (! cache()->has('records')) {
            return $result;
        }

        $records = cache()->get('records');
        foreach ($records as $record) {
            if ($record->user_id == $userId) {
                $result[] = $record;
            }
        }

        return $result;
    }

    public function allByUserAndCategory(int $userId, int $categoryId): array
    {
        $result = [];
        if (! cache()->has('records')) {
            return $result;
        }

        $records = cache()->get('records');
        foreach ($records as $record) {
            if ($record->user_id == $userId && $record->category_id == $categoryId) {
                $result[] = $record;
            }
        }

        return $result;
    }

}
