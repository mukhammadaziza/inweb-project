<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\LogoutRequest;
use App\Services\API\V1\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * Login user
     * 
     * @param LoginRequest $loginRequest
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function login(
        LoginRequest $loginRequest,
        AuthService $authService
    ): JsonResponse
    {
        $loggedInData = $authService->login($loginRequest->validated());

        return response()->json([
            'message' => 'Logged in successfully',
            'user' => $loggedInData['user'],
            'token' => $loggedInData['token'],
        ], 200);
    }

    /**
     * Logout current authenticated user
     * 
     * @param LogoutRequest $logoutRequest
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function logout(
        LogoutRequest $logoutRequest,
        AuthService $authService
    ): JsonResponse
    {
        $authService->logout();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
