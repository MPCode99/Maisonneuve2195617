@extends('layouts.app')
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Liste des étudiants</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Date de naissance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($etudiants as $etudiant)
                            <tr>
                                <td>{{ ucfirst($etudiant->nom) }}</td>
                                <td>{{ $etudiant->phone }}</td>
                                <td>{{ $etudiant->date_naissance }}</td>
                                <td>
                                    <a href="{{ route('etudiant.show', $etudiant->id) }}" class="btn btn-primary m-2">Profil</a>
                                    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-primary m-2">Modifier</a>
                                </td>
                            </tr>@empty
                                <tr><td class="text-danger">Aucun étudiant</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
@endsection