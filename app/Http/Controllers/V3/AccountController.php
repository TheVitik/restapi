<?php

namespace App\Http\Controllers\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\V2\DepositAccountRequest;
use App\Http\Resources\V3\AccountResource;
use App\Service\V2\AccountService;
use Illuminate\Http\JsonResponse;

use function response;

class AccountController extends Controller
{
    private AccountService $service;

    public function __construct(AccountService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        try {
            $accounts = $this->service->getAccounts();
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to get accounts',
            ], 500);
        }

        return response()->json(AccountResource::collection($accounts));
    }

    public function update(DepositAccountRequest $request, int $id): JsonResponse
    {
        try {
            $account = $this->service->deposit($request, $id);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to deposit money',
            ], 500);
        }

        return response()->json(new AccountResource($account));
    }
}
