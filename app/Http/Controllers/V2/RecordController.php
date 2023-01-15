<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\V2\CreateRecordRequest;
use App\Http\Requests\V2\GetRecordsRequest;
use App\Http\Resources\RecordResource;
use App\Service\V2\RecordService;
use Illuminate\Http\JsonResponse;

use function response;

class RecordController extends Controller
{
    public function index(GetRecordsRequest $request, RecordService $service): JsonResponse
    {
        try {
            $records = $service->getRecords($request);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to get records',
            ], 500);
        }

        return response()->json(RecordResource::collection($records));
    }

    public function store(CreateRecordRequest $request, RecordService $service): JsonResponse
    {
        try {
            $record = $service->createRecord($request);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to create a record',
            ], 500);
        }

        return response()->json(new RecordResource($record), 201);
    }
}
