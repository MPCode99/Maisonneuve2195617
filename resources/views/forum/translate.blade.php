@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">@lang('lang.texte_traduction_titre')</h6>
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="titre" class="form-label">@lang('lang.texte_titre')</label>
                        <input type="text" class="form-control" id="titre" name="titre" aria-describedby="@lang('lang.texte_titre')" value="{{ $article->titre }}">
                        @if($errors->has('titre'))
                            <span class="text-danger">{{ $errors->first('titre') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="contenu" class="form-label">@lang('lang.texte_contenu')</label>
                        <textarea class="form-control" id="contenu" name="contenu" aria-describedby="@lang('lang.texte_contenu')" rows="10">{{ $article->contenu }}</textarea>
                        @if($errors->has('contenu'))
                            <span class="text-danger">{{ $errors->first('contenu') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="langue_id" class="form-label">@lang('lang.texte_lang')</label>
                        <select class="form-select" id="langue_id" name="langue_id" aria-label="@lang('lang.texte_lang')">
                            @foreach($langues as $langue)
                            @if($article->langue_id != $langue->id)
                            <option value="{{ $langue->id }}" selected>{{ $langue->nom }}</option>
                            @endif
                            @endforeach
                        </select>
                        @if($errors->has('langue_id'))
                            <span class="text-danger">{{ $errors->first('langue_id') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('lang.texte_btn_traduire')</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection