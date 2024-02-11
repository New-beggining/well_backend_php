<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::query()->firstWhere('email', $request['email']);

        if (empty($user)) {
            throw new NotFoundHttpException("User with such email not found.", null, 404);
        }

        if (auth()->guard('api')->attempt(request(['email', 'password']))) {
            $user = $request->user('api');

            return response()->json([
                'message' => 'User login successfully.',
                'token'   => $user->createToken(config('app.name'))->plainTextToken,
                'user'    => UserResource::make($user)
            ]);
        } else {
            throw new NotFoundHttpException("Wrong password. Please, try again.", null, 404);
        }
    }

    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'User logout successfully.'
        ]);
    }
}
