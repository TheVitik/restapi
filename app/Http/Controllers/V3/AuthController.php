<?php

namespace App\Http\Controllers\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\V3\LoginRequest;
use App\Http\Requests\V3\RegisterRequest;
use App\Http\Resources\V3\UserResource;
use App\Service\V3\AuthService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private AuthService $auth;

    public function __construct(AuthService $authService)
    {
        $this->auth = $authService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $user = $this->auth->login($request);
            $token = $user->createToken('auth_token')->plainTextToken;
        } catch (AuthorizationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
        catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to login',
            ], 500);
        }

        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => new UserResource($user)
            ]
        ]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $user = $this->auth->register($request);
            $token = $user->createToken('auth_token')->plainTextToken;
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to register',
            ], 500);
        }

        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => new UserResource($user)
            ]
        ], 201);
    }
}
