@extends('layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">{{ ucfirst($etudiant->nom) }}</h6>
            <form method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"
                        aria-describedby="adresse" value="{{ $etudiant->nom }}">
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse"
                        aria-describedby="adresse" value="{{ $etudiant->adresse }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" 
                    aria-describedby="phone" value="{{ $etudiant->phone }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Courriel</label>
                    <input type="email" class="form-control" id="email" name="email"
                        aria-describedby="email" value="{{ $etudiant->email }}">
                </div>
                <div class="mb-3">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                        aria-describedby="date_naissance" value="{{ $etudiant->date_naissance }}">
                </div>
                <div class="mb-3">
                    <label for="ville_id" class="form-label">Ville</label>
                    <select class="form-select" id="ville_id" name="ville_id"
                        aria-label="ville">
                        @foreach($villes as $ville)
                        @if($etudiant->ville_id == $ville->id)
                        <option value="{{ $ville->id }}" selected>{{ $ville->nom }}</option>
                        @else
                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection