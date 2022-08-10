@extends('layouts.app')
@section('content')

<main class="signup-form">
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">@lang('lang.texte_connexion_titre')</h6>
                <div class="card-body">
                    @if($errors)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong><br>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" placeholder="@lang('lang.texte_connexion_utilisateur')" name="email" class="form-control" aria-describedby="@lang('lang.texte_courriel')">
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="@lang('lang.texte_connexion_passe')" name="password" class="form-control" aria-describedby="@lang('lang.texte_connexion_passe')">
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary">@lang('lang.texte_btn_connexion')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection