<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.connexion');
    }

    public function validConnexion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)):
            return redirect('connexion')->withErrors(trans('auth.failed'));
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));
        $id = Auth::user()->id;
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $idEtudiant = $etudiant[0]->id;
        return redirect('etudiant/'.$idEtudiant);
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\Response
     */
    public function deconnexion()
    {
        Session::flush();
        Auth::logout();

        return Redirect(route('connexion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('auth.inscription', ['villes' => $villes]);
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
            'date_naissance' => 'required|date_format:Y-m-d',
            'adresse' => 'required|min:4|max:100',
            'ville_id' => 'required|min:1|max:3',
            'email' => 'required|email|unique:etudiants,email,'.$etudiant->id,
            'password' => 'required|min:5'
        ]);
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        Etudiant::create([
            'name' => $user->name, 
            'phone' => $request->phone, 
            'date_naissance' => $request->date_naissance, 
            'adresse' => $request->adresse, 
            'ville_id' => $request->ville_id, 
            'email' => $user->email,
            'user_id' => $user->id
        ]);
        return redirect(route('connexion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
