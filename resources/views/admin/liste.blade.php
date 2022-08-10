@extends('layouts.app')
@section('content')
<!-- Table Start -->
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">@lang('lang.texte_liste_titre')</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('lang.texte_nom')</th>
                                    <th scope="col">@lang('lang.texte_telephone')</th>
                                    <th scope="col">@lang('lang.texte_datenaissance')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($etudiants as $etudiant)
                                <tr>
                                    <td>{{ ucwords($etudiant->name) }}</td>
                                    <td>{{ $etudiant->phone }}</td>
                                    <td>{{ $etudiant->date_naissance }}</td>
                                    <td>
                                        <a href="{{ route('admin.show', $etudiant->id) }}" class="btn btn-primary m-2">@lang('lang.texte_btn_profil')</a>
                                        <a href="{{ route('admin.edit', $etudiant->id) }}" class="btn btn-primary m-2">@lang('lang.texte_btn_modifier')</a>
                                    </td>
                                </tr>@empty
                                    <tr><td class="text-danger">@lang('lang.texte_liste_aucun')</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Table End -->
@endsection