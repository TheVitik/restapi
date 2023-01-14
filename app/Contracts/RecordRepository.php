<?php

namespace App\Contracts;

use App\Models\Record;

interface RecordRepository
{
    function create(Record $record): Record;

    function allByUser(int $userId): array;

    function allByUserAndCategory(int $userId, int $categoryId): array;
}
