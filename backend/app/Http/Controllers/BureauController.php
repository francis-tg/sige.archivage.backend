<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bureaux = Bureau::all();
        return response()->json($bureaux, 200);
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
            'label_div' => 'required',
            'desc_div'  => 'required',
            'type_bureau' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $bureaux = Bureau::create($request->all());
            DB::commit();
            return response()->json($bureaux, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json('{"error":"Erreur d\'enregistrement "}' . $th, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_bureau)
    {
        $bureaux = Bureau::findOrFail($code_bureau);
        return response()->json($bureaux, 200);
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
    public function update(Request $request, string $code_bureau)
    {
        try {
            $res = Bureau::find($code_bureau)->update($request->all());
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code_bureau)
    {
        try {
            DB::beginTransaction();
            $bureaux = Bureau::findOrFail($code_bureau);
            $bureaux->delete();
            DB::commit();
            return response()->json(['message' => 'Bureau supprimé avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => "Erreur de suppression: " . $th->getMessage()], 500);
        }
    }
}
