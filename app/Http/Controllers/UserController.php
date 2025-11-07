<?php
declare(strict_types=1);

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


        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'user' => $user
        ]);
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

    public function profile()
    {
        $user = User::all();
        return response()->json(['message' => "Profile logic not implemented", 'user' => $user], 200);
    }

    public function findById(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function edit(Request $request, $id)
    {
        // 逻辑待实现
        return ['message' => "Edit logic for $id not implemented"];
    }

    public function delete(Request $request, $id)
    {
        // 逻辑待实现
        $user = User::delete($id);
    }

    // (你之前 AI 生成的 adminLogin 和 patch 也写上，
    //  就算它们都指向 delete 或 logout)

    public function adminLogin(Request $request)
    {
        // 逻辑待实现
        return ['message' => 'AdminLogin logic not implemented'];
    }
}
