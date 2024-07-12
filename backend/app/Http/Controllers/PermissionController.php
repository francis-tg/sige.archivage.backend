<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::all();
        return response()->json($permission, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'label_permis' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $permission = Permission::create($request->all());
            DB::commit();
            return response()->json($permission, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json('{"error":"Erreur d\'enregistrement "}' . $th, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_permis)
    {

        $permission = Permission::findOrFail($code_permis);
        return response()->json($permission, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $code_permis)
    {
        try {
            $res = Permission::find($code_permis)->update($request->all());
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code_permis)
    {
        try {
            DB::beginTransaction();
            $permission = Permission::findOrFail($code_permis);
            $permission->delete();
            DB::commit();
            return response()->json(['message' => 'Permission supprimé avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => "Erreur de suppression: " . $th->getMessage()], 500);
        }
    }
}
