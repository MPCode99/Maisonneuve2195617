@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">{{ ucfirst($etudiant->nom) }}</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent">Adresse : {{ $etudiant->adresse }}</li>
                <li class="list-group-item bg-transparent">Téléphone : {{ $etudiant->phone }}</li>
                <li class="list-group-item bg-transparent">Courriel : {{ $etudiant->email }}</li>
                <li class="list-group-item bg-transparent">Date de naissance : {{ $etudiant->date_naissance }}</li>
                <li class="list-group-item bg-transparent">Ville : {{ $etudiant->ville_nom }}</li>
            </ul>
            <form method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-2">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection