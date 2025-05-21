<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = validator($credentials, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        // Penting: Ambil user dari Auth setelah berhasil login
        $user = Auth::user();

        // Buat token
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
    public function logout(Request $request)
    {
        // Hapus token aktif saat ini
        $request->user()->currentAccessToken()->delete(); // token aktif
        // $request->user()->tokens()->delete(); // semua token

        return response()->json(['message' => 'Logout berhasil']);
    }

    public function profile(Request $request)
    {
        dd($request->user());
        return response()->json([
            'user' => $request->user(),
        ]);
    }

}
