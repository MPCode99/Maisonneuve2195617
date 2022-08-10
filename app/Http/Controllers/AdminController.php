<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Etudiant;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::select('etudiants.id', 'etudiants.name', 'etudiants.phone', 'etudiants.date_naissance')->get();
        return view('admin.liste', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('admin.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'phone' => 'required|regex:/(^(\d{3})-(\d{3})-(\d{4})$)/',
            'email' => 'required|email|unique:etudiants,email,'.$etudiant->id,
            'date_naissance' => 'required|date_format:Y-m-d',
            'adresse' => 'required|min:4|max:100',
            'ville_id' => 'required|min:1|max:3'
        ]);
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id
        ]);

        return redirect(route('admin.show', $etudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant = Etudiant::select('etudiants.*', 'villes.nom as ville_nom')
                    ->join('villes', 'etudiants.ville_id', '=', 'villes.id')
                    ->WHERE('etudiants.id', $etudiant->id)
                    ->get(); 
        return view('admin.show', ['etudiant' => $etudiant[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('admin.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'phone' => 'required|regex:/(^(\d{3})-(\d{3})-(\d{4})$)/',
            'email' => 'required|email|unique:etudiants,email,'.$etudiant->id,
            'date_naissance' => 'required|date_format:Y-m-d',
            'adresse' => 'required|min:4|max:100',
            'ville_id' => 'required|min:1|max:3'
        ]);
        $etudiant->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id
        ]);
        return redirect(route('admin.edit', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('admin'));
    }
}
