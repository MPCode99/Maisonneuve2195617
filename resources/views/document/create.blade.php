@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">@lang('lang.texte_nav_ajouter_doc')</h6>
                <form action="{{route('document.create.upload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titre" class="form-label">@lang('lang.texte_titre')</label>
                        <input type="text" class="form-control" id="titre" name="titre" aria-describedby="@lang('lang.texte_titre')" value="{{old('titre')}}">
                        @if($errors->has('titre'))
                            <span class="text-danger">{{ $errors->first('titre') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="langue_id" class="form-label">@lang('lang.texte_lang')</label>
                        <select class="form-select" id="langue_id" name="langue_id" aria-label="@lang('lang.texte_lang')">
                            @foreach($langues as $langue)
                            <option value="{{ $langue->id }}">{{ $langue->nom }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('langue_id'))
                            <span class="text-danger">{{ $errors->first('langue_id') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">@lang('lang.texte_document_fichier')</label>
                        <input type="file" class="form-control" id="file" name="file" aria-describedby="@lang('lang.texte_document_fichier')" value="{{old('file')}}">
                        @if($errors->has('file'))
                            <span class="text-danger">{{ $errors->first('file') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('lang.texte_btn_ajouter')</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection