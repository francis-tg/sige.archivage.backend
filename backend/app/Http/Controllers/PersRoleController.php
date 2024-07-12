<?php

namespace App\Http\Controllers;

use App\Models\PersRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persRoles = PersRole::all();
        return response()->json($persRoles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_role' => 'required|string',
            'code_bureau' => 'required|string',
            'code_pers' => 'required|string',
            'date_debut_role' => 'required|date',
            'date_fin_role' => 'nullable|date',
            'statut' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $persRole = PersRole::create($validatedData);
            DB::commit();
            return response()->json($persRole, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur d\'enregistrement: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $persRole = PersRole::findOrFail($id);
        return response()->json($persRole, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code_role' => 'required|string',
            'code_bureau' => 'required|string',
            'code_pers' => 'required|string',
            'date_debut_role' => 'required|date',
            'date_fin_role' => 'nullable|date',
            'statut' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $persRole = PersRole::findOrFail($id);
            $persRole->update($validatedData);
            DB::commit();
            return response()->json($persRole, 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur de mise à jour: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $persRole = PersRole::findOrFail($id);
            $persRole->delete();
            DB::commit();
            return response()->json(['message' => 'Rôle supprimé avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur de suppression: ' . $th->getMessage()], 500);
        }
    }
}
