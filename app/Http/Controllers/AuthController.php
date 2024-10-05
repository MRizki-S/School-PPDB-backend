<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $user  = Auth::user()->load('role');

            $token = $user->createToken('Personal Access Token')->plainTextToken;

            return response()->json([
                "error" => false,
                "message" => "Login succesfully",
                "data" => $user,
                "token" => $token
            ], 200);
        }else {
            return response()->json([
                "error" => true,
                "message" => "email atau password salah"
            ], 401);
        }
    }

    public function logout(Request $request) {
        // dd($request->user());
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Succesfully  Logout!'
        ]);
    }


    public function register(Request $request)
    {
        // Validasi input
        try {
            $validation = $request->validate([
                "username" => 'required|string|max:255',
                "email" => 'required|email|unique:users',
                "password" => 'required|min:8', // password harus minimal 8 karakter
            ]);
        } catch (ValidationException $e) {
            // Mengembalikan detail kesalahan validasi
            return response()->json([
                'error' => true,
                'message' => 'Validation failed',
                'errors' => $e->errors(), // Mengembalikan kesalahan validasi spesifik
            ], 422);
        }

        // Buat pengguna baru
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                "role_id" => 2
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Account created successfully',
                'data' => $user // Kembalikan data pengguna yang dibuat
            ], 201); // HTTP status code 201 Created
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Failed to create account',
                'details' => $e->getMessage() // Mengembalikan pesan kesalahan yang lebih spesifik
            ], 500); // HTTP status code 500 Internal Server Error
        }
    }

}
