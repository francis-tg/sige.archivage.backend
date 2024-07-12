<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::all();
        return response()->json($categorie, 200);
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
            'label_cat'  => 'required',
        ]);
        try {
            DB::beginTransaction();
            $categorie = Categorie::create($request->all());
            DB::commit();
            return response()->json($categorie, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json('{"error":"Erreur d\'enregistrement "}' . $th, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_cat)
    {
        $categorie = Categorie::findOrFail($id_cat);
        return response()->json($categorie, 200);
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
    public function update(Request $request, string $id_cat)
    {
        try {
            $res = Categorie::find($id_cat)->update($request->all());
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_cat)
    {
        try {
            DB::beginTransaction();
            $categorie = Categorie::findOrFail($id_cat);
            $categorie->delete();
            DB::commit();
            return response()->json(['message' => 'Categories supprimé avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => "Erreur de suppression: " . $th->getMessage()], 500);
        }
    }
}
