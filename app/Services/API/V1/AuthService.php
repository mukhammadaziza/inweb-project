<?php

namespace App\Services\API\V1;

use App\Http\Resources\API\V1\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
     /**
     * Login user
     * 
     * @param array $data
     */
    public function login(array $data): array
    {
        $user = User::query()
                    ->where('email', $data['email'])
                    ->first();
        
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        $user->tokens()->delete();
        $token = $user->createToken('auth-token')->plainTextToken;

        $response = [
            'user' => new UserResource($user),
            'token' => $token
        ];

        return $response;
    }

    /**
     * Logout user
     * 
     */
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
