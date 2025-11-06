<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $validate = $request->validated();

        $user = User::where('loginId', $validate['loginId'])->first();

        if ($user && Hash::check($validate['password'], $user->password)) {
            $user->tokens()->delete(); // 删除所有令牌
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 200);
        }
    }

    public function register(RegisterUserRequest $request)
    {
        $validate = $request->validated();

        $user = User::create([
            'email' => $validate['email'],
            'loginId' => $validate['loginId'],
            'password' => Hash::make($validate['password']),
            'headerimg' => $validate['headerimg'],
            'nickname' => $validate['nickname'],
        ]);

        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user
        ], 201);
    }

    public function profile(Request $request)
    {
        // 逻辑待实现
        return ['message' => 'Profile logic not implemented'];
    }

    public function findById(Request $request, $id) {}

    public function edit(Request $request, $id)
    {
        // 逻辑待实现
        return ['message' => "Edit logic for $id not implemented"];
    }

    public function delete(Request $request, $id)
    {
        // 逻辑待实现
        return ['message' => "Delete logic for $id not implemented"];
    }

    // (你之前 AI 生成的 adminLogin 和 patch 也写上，
    //  就算它们都指向 delete 或 logout)

    public function adminLogin(Request $request)
    {
        // 逻辑待实现
        return ['message' => 'AdminLogin logic not implemented'];
    }
}
