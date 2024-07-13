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
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $admin_cred = request(["email", 'password']);
        $token = auth('api')->attempt($admin_cred);
        if (!$token) {
            # code...
            return response()->json(['message' => 'Identifiants incorrects',], 401);
        }
        return response()->json([
            'message' => 'Authentification réussie',
            'token' => $token,
        ], 200);
    }
    //}

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

            return response()->json([
                'message' => 'Authentification réussie',
                'token' => $token,
                'personnel' => $personnel,
            ], 200);
        } else {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
    }
    public function me(){
        return response()->json(auth("api")->user());
    }
}
