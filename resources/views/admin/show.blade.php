@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">{{ ucfirst($etudiant->name) }}</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent">@lang('lang.texte_telephone') : {{ $etudiant->phone }}</li>
                    <li class="list-group-item bg-transparent">@lang('lang.texte_courriel') : {{ $etudiant->email }}</li>
                    <li class="list-group-item bg-transparent">@lang('lang.texte_datenaissance') : {{ $etudiant->date_naissance }}</li>
                    <li class="list-group-item bg-transparent">@lang('lang.texte_adresse') : {{ $etudiant->adresse }}</li>
                    <li class="list-group-item bg-transparent">@lang('lang.texte_ville') : {{ $etudiant->ville_nom }}</li>
                </ul>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-2">@lang('lang.texte_btn_supprimer')</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection