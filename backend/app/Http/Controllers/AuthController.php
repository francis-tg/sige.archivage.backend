<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $user = auth("api")->user();
        $role = $user->roles()->pluck('label')->first();
        $personnel = Personnels::where("user_id", $user->id)->first();

        if (!$personnel) {
            return response()->json([
                'message' => 'Personnel not found',
            ], 404);
        }

        $photoUrl = $personnel->photo ? Storage::url($personnel->photo) : null;

        return response()->json([
            'user' => $user,
            'profile' => $photoUrl,
            'role' => $role,
            'token' => JWTAuth::refresh(),
        ]);
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|unique:users,email',
            'pwd_pers' => 'required|string',
        ]);
        $personnel = auth("api")->user();
        $personnel->update($validate);
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
            "message" => "Connexion réussie",
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
