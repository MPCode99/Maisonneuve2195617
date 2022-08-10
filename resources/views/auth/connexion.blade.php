@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3>@lang('lang.texte_connexion_titre')</h3>
                </div>
                @if($errors)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi-exclamation-triangle-fill"></i>
                        <strong>{{ $error }}</strong><br>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                @endif
                <form action="{{ route('valid.connexion') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="@lang('lang.texte_courriel')" aria-describedby="@lang('lang.texte_courriel')">
                        <label for="floatingEmail">@lang('lang.texte_courriel')</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="@lang('lang.texte_connexion_passe')" aria-describedby="@lang('lang.texte_connexion_passe')">
                        <label for="floatingPassword">@lang('lang.texte_connexion_passe')</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">@lang('lang.texte_btn_identifier')</button>
                    <p class="text-center mb-0">@lang('lang.texte_creer_compte') <a href="{{ route('inscription') }}">@lang('lang.texte_inscription_titre')</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection