<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        return view('etudiant.index', ['name' => $name, 'id' => $id, 'etudiant' => $etudiant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){$name = Auth::user()->name;}
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes, 'name' => $name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Etudiant  $etudiant
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

        return redirect(route('etudiant.show', $etudiant->id));
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.*', 'villes.nom as ville_nom')
                    ->join('villes', 'etudiants.ville_id', '=', 'villes.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)
                    ->get(); 
        $email = "";
        if(Auth::check()){$name = Auth::user()->name;}
        if(Auth::check()) {$email = Auth::user()->email;}
        return view('etudiant.show', ['etudiant' => $etudiant[0], 'name' => $name, 'email' => $email, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        if(Auth::check()){$name = Auth::user()->name;}
        if(Auth::check()) {$id = Auth::user()->id;}
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes, 'name' => $name, 'id' => $id]);
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
            'ville_id' => 'required|min:1|max:3',
        ]);
        $user_id = $etudiant->user_id;
        User::where('id', $user_id)->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);
        $etudiant->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id
        ]);
        return redirect(route('etudiant.edit', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $user_id = $etudiant->user_id;
        $etudiant->delete();
        User::where('id', $user_id)->delete();
        Session::flush();
        Auth::logout();
        return redirect(route('connexion'));
    }
}
