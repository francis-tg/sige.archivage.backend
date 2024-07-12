<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document = Document::all();
        return response()->json($document, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'label_div' => 'required',
            'id_cat' => 'required',
            'code_bureau' => 'required',
            'titre' => 'required',
            'auteur' => 'required',
            'date_creation' => 'required',
            'date_der_mod' => 'required',
            'type' => 'required',
            'resumé' => 'required',
            'reference' => 'required',
            'emplacement_doc' => 'required',
            'status_doc' => 'required',
            'taille' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048' // Adjust the file types and size as needed
        ]);
        try {
            DB::beginTransaction();
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('documents', 'public');
                $validatedData['file'] = $filePath;
                $validatedData['type'] = $file->getClientMimeType();
                $validatedData['taille'] = $file->getSize();
            }

            $document = Document::create($validatedData);
            DB::commit();
            return response()->json($document, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json('{"error":"Erreur d\'enregistrement "}' . $th, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $doc_id)
    {
        $document = Document::findOrFail($doc_id);
        return response()->json($document, 200);
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
    public function update(Request $request, string $doc_id)
    {
            $validatedData = $request->validate([
                'label_div' => 'required|string|max:255',
                'id_cat' => 'required|integer',
                'code_bureau' => 'required|string|max:255',
                'titre' => 'required|string|max:255',
                'auteur' => 'required|string|max:255',
                'date_creation' => 'required|date',
                'date_der_mod' => 'required|date',
                'type' => 'required|string|max:255',
                'resumé' => 'required|string',
                'reference' => 'required|string|max:255',
                'emplacement_doc' => 'required|string|max:255',
                'status_doc' => 'required|string|max:255',
                'taille' => 'required|integer'
        ]);

        try {
            $res = Document::find($doc_id)->update($request->all());
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $doc_id)
    {
        try {
            DB::beginTransaction();
            $document = Document::findOrFail($doc_id);
            $document->delete();
            DB::commit();
            return response()->json(['message' => 'Document supprimé avec succès'], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => "Erreur de suppression: " . $th->getMessage()], 500);
        }
    }
}
