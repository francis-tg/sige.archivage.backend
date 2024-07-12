<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048' // Adjust the file types and size as needed
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('documents', 'public');
                $validatedData['file_path'] = $filePath;
                $validatedData['file_type'] = $file->getClientMimeType();
                $validatedData['file_size'] = $file->getSize();
            }

            $document = Document::create($validatedData);

            DB::commit();
            return response()->json($document, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => 'Erreur d\'enregistrement: ' . $th->getMessage()], 500);
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
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048' // Adjust the file types and size as needed
        ]);

        try {
            $document = Document::findOrFail($doc_id);

            if ($request->hasFile('file')) {
                // Delete old file if exists
                if ($document->file_path) {
                    Storage::disk('public')->delete($document->file_path);
                }

                $file = $request->file('file');
                $filePath = $file->store('documents', 'public');
                $validatedData['file_path'] = $filePath;
                $validatedData['file_type'] = $file->getClientMimeType();
                $validatedData['file_size'] = $file->getSize();
            }

            $document->update($validatedData);

            return response()->json($document, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Erreur de mise à jour: ' . $th->getMessage()], 500);
        }
    }
}
