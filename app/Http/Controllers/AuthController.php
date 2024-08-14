<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * REGISTER METHOD.
     */
    public function register(Request $request)
    {
        return 'register';
    }

    /**
     * LOGIN METHOD.
     */
    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email|exists:users',
                'password' => 'required|min:8'
            ],
            // [
            //     '' => ''
            // ]
        );

        if ($validated) {
            try {
                if (Auth::attempt($validated, $request->remember_me)) {
                    $user = User::where('email', $request->email)->first();
                    $token = $user->createToken($user->id);
                    $user_data = [
                        "name" => $user->name,
                        "email" => $user->email,
                        "role_id" => $user->role_id,
                        "is_active" => $user->is_active,
                        "token" => $token->plainTextToken,
                    ];

                    return response()->json([
                        "result" => "Success",
                        "message" => "Login attempt successfully",
                        "user_data" => $user_data,
                    ], 200);
                } else {
                    return response()->json([
                        "result" => "Failed",
                        "message" => "Email or Password mismatch"
                    ], 404);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    "result" => "Error",
                    "message" => $th->getMessage()
                ], 404);
            }
        }
    }


    /**
     * LOGOUT METHOD.
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $request->user()->currentAccessToken()->delete();
            Auth::guard('web')->logout();
            return response()->json([
                "result" => "success",
                "message" => "You're Logged Out"
            ], 200);
        }

        return response()->json([
            "result" => "error",
            "message" => "User not authenticated"
        ], 401);
    }
}
