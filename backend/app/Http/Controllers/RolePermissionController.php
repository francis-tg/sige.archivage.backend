<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rolePermissions = RolePermission::all();
        return response()->json($rolePermissions, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_permis' => 'required|string|unique:role_permission',
            'code_role' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $rolePermission = RolePermission::create($validatedData);
            DB::commit();
            return response()->json($rolePermission, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur d\'enregistrement: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($code_permis)
    {
        $rolePermission = RolePermission::findOrFail($code_permis);
        return response()->json($rolePermission, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code_permis)
    {
        $validatedData = $request->validate([
            'code_role' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $rolePermission = RolePermission::findOrFail($code_permis);
            $rolePermission->update($validatedData);
            DB::commit();
            return response()->json($rolePermission, 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur de mise à jour: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code_permis)
    {
        try {
            DB::beginTransaction();
            $rolePermission = RolePermission::findOrFail($code_permis);
            $rolePermission->delete();
            DB::commit();
            return response()->json(['message' => 'Permission supprimée avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Erreur de suppression: ' . $th->getMessage()], 500);
        }
    }
}
