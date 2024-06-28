<?php

namespace App\Http\Controllers;
use App\Models\Document;



use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $document = new Document;
        $document->data = $request->input('data');
        $document->save();

        return response()->json(['message' => 'Document saved successfully']);
    }

    public function index()
    {
        $documents = Document::all();
        return view('documents.index', ['documents' => $documents]);
    }



}
