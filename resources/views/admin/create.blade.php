@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">@lang('lang.texte_ajout_titre')</h6>
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('lang.texte_nom')</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="@lang('lang.texte_nom')" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('lang.texte_telephone')</label>
                        <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="@lang('lang.texte_telephone')" value="{{old('phone')}}">
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('lang.texte_courriel')</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="@lang('lang.texte_courriel')" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance" class="form-label">@lang('lang.texte_datenaissance')</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" aria-describedby="@lang('lang.texte_datenaissance')" value="{{old('date_naissance')}}">
                        @if($errors->has('date_naissance'))
                            <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">@lang('lang.texte_adresse')</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" aria-describedby="@lang('lang.texte_adresse')" value="{{old('adresse')}}">
                        @if($errors->has('adresse'))
                            <span class="text-danger">{{ $errors->first('adresse') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ville_id" class="form-label">@lang('lang.texte_ville')</label>
                        <select class="form-select" id="ville_id" name="ville_id" aria-label="@lang('lang.texte_ville')">
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ville_id'))
                            <span class="text-danger">{{ $errors->first('ville_id') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('lang.texte_btn_ajouter')</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection