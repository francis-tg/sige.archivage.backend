<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnel = Personnel::all();
        return response()->json($personnel, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_pers' => 'required|string|unique:personnel',
            'nom_pers' => 'required|string',
            'prenom_pers' => 'required|string',
            'sexe_pers' => 'required|string',
            'date_naissance_pers' => 'required|date',
            'lieu_naissance_pers' => 'required|string',
            'statut_mat_pers' => 'required|string',
            'lieu_residence_pers' => 'required|string',
            'first_phone_pers' => 'required|string',
            'second_phone_pers' => 'nullable|string',
            'cni_pers' => 'required|string',
            'email_pers' => 'required|string|email|unique:personnel',
            'login_pers' => 'required|string|unique:personnel',
            'pwd_pers' => 'required|string',
            'photo_pers' => 'nullable|string',
            'lang_pers' => 'nullable|string',
            'bibliographie_pers' => 'nullable|string',
            'nb_enfant_pers' => 'nullable|integer',
        ]);

        $validatedData['pwd_pers'] = Hash::make($validatedData['pwd_pers']);

        try {
            DB::beginTransaction();
            $personnel = Personnel::create($validatedData);
            DB::commit();
            return response()->json($personnel, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur d\'enregistrement: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($code_pers)
    {
        $personnel = Personnel::findOrFail($code_pers);
        return response()->json($personnel, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code_pers)
    {
        $validatedData = $request->validate([
            'nom_pers' => 'required|string',
            'prenom_pers' => 'required|string',
            'sexe_pers' => 'required|string',
            'date_naissance_pers' => 'required|date',
            'lieu_naissance_pers' => 'required|string',
            'statut_mat_pers' => 'required|string',
            'lieu_residence_pers' => 'required|string',
            'first_phone_pers' => 'required|string',
            'second_phone_pers' => 'nullable|string',
            'cni_pers' => 'required|string',
            'email_pers' => 'required|string|email',
            'login_pers' => 'required|string',
            'pwd_pers' => 'nullable|string',
            'photo_pers' => 'nullable|string',
            'lang_pers' => 'nullable|string',
            'bibliographie_pers' => 'nullable|string',
            'nb_enfant_pers' => 'nullable|integer',
        ]);

        try {
            DB::beginTransaction();
            $personnel = Personnel::findOrFail($code_pers);

            if (!empty($validatedData['pwd_pers'])) {
                $validatedData['pwd_pers'] = Hash::make($validatedData['pwd_pers']);
            } else {
                unset($validatedData['pwd_pers']);
            }

            $personnel->update($validatedData);
            DB::commit();
            return response()->json(['message' => 'Personnel mis à jour avec succès', 'personnel' => $personnel], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur de mise à jour: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code_pers)
    {
        try {
            DB::beginTransaction();
            $personnel = Personnel::findOrFail($code_pers);
            $personnel->delete();
            DB::commit();
            return response()->json(['message' => 'Personnel supprimé avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur de suppression: ' . $th->getMessage()], 500);
        }
    }
}
