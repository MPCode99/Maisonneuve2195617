@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3>@lang('lang.texte_inscription_titre')</h3>
                </div>
                <form action="{{ route('sauvegarde.inscription') }}" method="post">
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
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="@lang('lang.texte_courriel')" aria-describedby="@lang('lang.texte_courriel')" value="{{old('email')}}">
                        <label for="floatingEmail">@lang('lang.texte_courriel')</label>
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="@lang('lang.texte_connexion_passe')" aria-describedby="@lang('lang.texte_connexion_passe')">
                        <label for="floatingPassword">@lang('lang.texte_connexion_passe')</label>
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">@lang('lang.texte_btn_enregistrer')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection