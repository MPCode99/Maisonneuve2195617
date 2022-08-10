<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Document;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::select('documents.id', 'titre', 'date', 'file_name', 'etudiant_id', 'langue_id', 'langues.nom as langue', 'etudiants.name as auteur')
                    ->join('langues', 'documents.langue_id', '=', 'langues.id')
                    ->join('etudiants', 'documents.etudiant_id', '=', 'etudiants.id')
                    ->orderBy('date', 'asc')->get();
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        return view('document.fichiers', ['documents' => $documents, 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){$name = Auth::user()->name;}
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        $langues = Langue::all();
        return view('document.create', ['langues' => $langues, 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|min:2|max:100',
            'langue_id' => 'required|min:1|max:3',
            'file.*' => 'required|mimes:doc,docx,odt,zip,pdf|max:500000'
        ]);
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                ->join('users', 'etudiants.user_id', '=', 'users.id')
                ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        $document = new Document;
        if($request->file()) {
            $document->titre = $request->titre;
            $document->date = date('Y-m-d');
            $document->etudiant_id = $etudiant->id;
            $document->langue_id  = $request->langue_id;
            $fileName = date('Ymd\THisu').'_'.$request->titre.'.'.$request->file->getClientOriginalExtension();
            $document->file_name = $fileName;
            $request->file->move(public_path()."/uploads/", $fileName);
            $document->save();
            return redirect(route('document.fichiers', $etudiant->id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $documentId = $document->id;
        $document = Document::select('titre', 'file_name', 'langue_id', 'etudiant_id')
                    ->join('langues', 'documents.langue_id', '=', 'langues.id')
                    ->WHERE('documents.id', $documentId)->get();
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$idAuth = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $idAuth)->get();
        $etudiant = $etudiant[0];
        $langues = Langue::all();
        return view('document.edit', ['langues' => $langues, 'document' => $document[0], 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'titre' => 'required|min:2|max:255',
            'langue_id' => 'required|min:1|max:3'
        ]);
        $id = $document->id;
        Document::where('id', $id)->update([
            'titre' => $request->titre,
            'langue_id' => $request->langue_id
        ]);
        return redirect(route('document.edit', $document->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $id = $document->id;
        $path = public_path()."/uploads/".$document->file_name;
        Document::where('id', $id)->delete();
        unlink($path);
        return redirect(route('document.fichiers'));
    }
}
