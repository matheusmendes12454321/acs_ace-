<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'cpf' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['cpf' => $credentials['cpf'], 'password' => $credentials['password']])) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            
            return response()->json([
                'success' => true,
                'user' => $user,
                'token' => $token,
                'role' => $user->role
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'CPF ou senha inválidos'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => true]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}