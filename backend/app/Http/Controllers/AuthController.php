<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Authenticate the personnel.
     */
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        $admin_cred = ['email' => $validatedData['login'], 'password' => $validatedData['password']];
        $token = auth('api')->attempt($admin_cred);
        if (!$token) {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        auth("api")->logout();
        return response()->json(["message" => "Déauthentification réussie"]);
    }

    /**
     * Login the personnel.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_pers' => 'required|string',
            'pwd_pers' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $personnel = Auth::user();
            $token = JWTAuth::fromUser($personnel);

            // Retrieve the role for the personnel
            $role = $personnel->roles()->pluck('name')->first();

            return response()->json([
                'message' => 'Authentification réussie',
                'token' => $token,
                'role' => $role, // Inject the role into the response
                'personnel' => $personnel,
            ], 200);
        } else {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
    }

    public function me()
    {
        $personnel = auth("api")->user();
        $role = $personnel->roles()->pluck('name')->first();

        return response()->json([
            'user' => $personnel,
            'role' => $role,
            'token' => JWTAuth::refresh(),
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
