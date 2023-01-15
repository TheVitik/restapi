<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\V2\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Service\V2\UserService;
use Illuminate\Http\JsonResponse;

use function response;

class UserController extends Controller
{
    public function store(CreateUserRequest $request, UserService $service): JsonResponse
    {
        try {
            $user = $service->createUser($request);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return response()->json(new UserResource($user), 201);
    }
}
