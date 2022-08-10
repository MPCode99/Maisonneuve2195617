@extends('layouts.app')
@section('content')
<!-- Table Start -->
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"></h6>
                    <div class="border rounded p-4 pb-0 mb-4">
                        <figure>
                            <p><strong>{{ ucfirst($article->titre) }}</strong></p>
                            <blockquote class="blockquote">
                                <p>{{ $article->contenu }}</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <cite title="Source Title">{{ $article->auteur }}</cite>
                                <p>{{ $article->date }}</p>
                            </figcaption>
                        </figure>
                    </div>
                    @if($article->etudiant_id == $etudiant->id)
                    <a href="{{ route('forum.edit', $article->id) }}" class="btn btn-primary m-2">@lang('lang.texte_btn_modifier')</a>
                    <br>
                    <a href="{{ route('forum.translate', $article->id) }}" class="btn btn-primary m-2">@lang('lang.texte_btn_traduire')</a>
                    <form method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2">@lang('lang.texte_btn_supprimer')</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Table End -->
@endsection