<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Service\V1\RecordService;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

use function response;

class RecordController extends Controller
{
    public function index(Request $request, RecordService $service): JsonResponse
    {
        $records = $service->getRecords($request);

        return response()->json($records);
    }

    public function store(Request $request, RecordService $service): JsonResponse
    {
        $record = $service->createRecord($request);

        return response()->json($record, 201);
    }
}
