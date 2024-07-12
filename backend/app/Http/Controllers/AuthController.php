<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Authenticate the personnel.
     */
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'login_pers' => 'required|string',
            'pwd_pers' => 'required|string',
        ]);

        $personnel = Personnel::where('login_pers', $validatedData['login_pers'])->first();

        if ($personnel && Hash::check($validatedData['pwd_pers'], $personnel->pwd_pers)) {
            return response()->json(['message' => 'Authentification réussie', 'personnel' => $personnel], 200);
        } else {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
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
            return response()->json(['message' => 'Authentification réussie', 'personnel' => $personnel], 200);
        } else {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
    }
}
