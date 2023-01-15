<?php

namespace App\Repository\Cache;

use App\Models\V1\Record;

use Psr\Container\ContainerExceptionInterface;

use Psr\Container\NotFoundExceptionInterface;

use function cache;
use function now;

class CacheRecordRepository
{
    /**
     * Create a new record
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
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

    /**
     * Get all records by user id
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
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

    /**
     * Get all records by user id and category id
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
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
