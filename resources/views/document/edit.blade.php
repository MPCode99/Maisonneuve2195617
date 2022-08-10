@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">@lang('lang.texte_nav_ajouter_doc')</h6>
                <form method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="titre" class="form-label">@lang('lang.texte_titre')</label>
                        <input type="text" class="form-control" id="titre" name="titre" aria-describedby="@lang('lang.texte_titre')" value="{{ $document->titre }}">
                        @if($errors->has('titre'))
                            <span class="text-danger">{{ $errors->first('titre') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="langue_id" class="form-label">@lang('lang.texte_lang')</label>
                        <select class="form-select" id="langue_id" name="langue_id" aria-label="@lang('lang.texte_lang')">
                            @foreach($langues as $langue)
                            @if($document->langue_id == $langue->id)
                            <option value="{{ $langue->id }}" selected>{{ $langue->nom }}</option>
                            @else
                            <option value="{{ $langue->id }}">{{ $langue->nom }}</option>
                            @endif
                            @endforeach
                        </select>
                        @if($errors->has('langue_id'))
                            <span class="text-danger">{{ $errors->first('langue_id') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('lang.texte_btn_modifier')</button>
                </form>
                @if($document->etudiant_id == $etudiant->id)
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-2">@lang('lang.texte_btn_supprimer')</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection