<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\Harisa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class Auth extends Controller
{
    /**
     * Show login form
     */
    public function login()
    {       
        return view('admin.login'); 
    }
  
    /**
     * Process login request
     */
    public function loginProcess(Request $request): JsonResponse
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                return Harisa::apiResponse(422, $validator->errors(), 'Validation failed');
            }

            $username = $request->input('username');
            $password = $request->input('password');

            // Find user by username
            $user = User::where('username', $username)->first();

            if (!$user) {
                return Harisa::apiResponse(401, null, 'Username not found');
            }

            // Check password
            if (!Hash::check($password, $user->password)) {
                return Harisa::apiResponse(401, null, 'Wrong password');
            }

            // Check if user is active (for non-admin users)
            if ($user->role === 0 && !empty($user->confimation)) {
                return Harisa::apiResponse(401, null, 'Account not activated');
            }

            // Generate new token
            $token = $user->generateToken();

            // Return success response
            return Harisa::apiResponse(200, [
                'token' => $token,
                'user' => $user->only(['id', 'username', 'fullname', 'email', 'role']),
                'expires_at' => now()->addDays(30)->toISOString(),
            ], 'Login successful');

        } catch (ValidationException $e) {
            return Harisa::apiResponse(422, $e->errors(), 'Validation failed');
        } catch (\Exception $e) {
            return Harisa::apiResponse(500, null, 'Internal server error');
        }
    }

    /**
     * Validate token
     */
    public function validateToken(string $token): JsonResponse
    {
        try {
            $user = User::where('token', strtolower($token))->first();

            if (!$user) {
                return Harisa::apiResponse(401, null, 'Invalid token');
            }

            // Check if user is still active
            if ($user->role === 0 && !empty($user->confimation)) {
                return Harisa::apiResponse(401, null, 'Account not activated');
            }

            return Harisa::apiResponse(200, [
                'token' => $token,
                'username' => $user->username,
                'user_id' => $user->id,
                'role' => $user->role,
                'is_valid' => true,
            ], 'Token is valid');

        } catch (\Exception $e) {
            return Harisa::apiResponse(500, null, 'Internal server error');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $token = $request->header('Authorization');
            $token = str_replace('bearer ', '', strtolower($token));

            $user = User::where('token', $token)->first();

            if ($user) {
                $user->update(['token' => null]);
            }

            return Harisa::apiResponse(200, null, 'Logout successful');

        } catch (\Exception $e) {
            return Harisa::apiResponse(500, null, 'Internal server error');
        }
    }

    /**
     * Refresh token
     */
    public function refreshToken(Request $request): JsonResponse
    {
        try {
            $token = $request->header('Authorization');
            $token = str_replace('bearer ', '', strtolower($token));

            $user = User::where('token', $token)->first();

            if (!$user) {
                return Harisa::apiResponse(401, null, 'Invalid token');
            }

            // Generate new token
            $newToken = $user->generateToken();

            return Harisa::apiResponse(200, [
                'token' => $newToken,
                'expires_at' => now()->addDays(30)->toISOString(),
            ], 'Token refreshed successfully');

        } catch (\Exception $e) {
            return Harisa::apiResponse(500, null, 'Internal server error');
        }
    }
}