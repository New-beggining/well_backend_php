<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $params = $request->validated();

        $user = User::create($params);

        return response()->json([
            'message' => 'User registered successfully.',
            'user'    => UserResource::make($user)
        ]);
    }
}
