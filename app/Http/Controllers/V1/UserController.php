<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Service\V1\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use function response;

class UserController extends Controller
{
    public function store(Request $request, UserService $service): JsonResponse
    {
        $user = $service->createUser($request);

        return response()->json($user, 201);
    }
}
