<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $params = $request->validated();

        $user = User::create($params);

        return response()->json([
            'message' => 'User registered successfully.',
            'user'    => UserResource::make($user)
        ]);
    }

    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'users' => UserResource::collection($users)
        ]);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json([
            'user' => UserResource::make($user)
        ]);
    }

    public function update(User $user, UpdateUserRequest $request): JsonResponse
    {
        $params = $request->validated();

        $user->update($params);

        return response()->json([
            'message' => 'User data updated successfully.',
            'user' => UserResource::make($user)
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.',
        ]);
    }
}
