@extends('layouts.app')
@section('content')
<!-- Table Start -->
@php $locale = session()->get('locale');
@endphp
@if($locale=='en')
@php($langueLocal='English')
@else
@php($langueLocal='Français')
@endif
<main>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Articles</h6>
                    @forelse($articles as $article)
                    @if($langueLocal==$article->langue)
                    <div class="border rounded p-4 pb-0 mb-4">
                        <figure>
                            <p><strong>{{ mb_strimwidth(ucfirst($article->titre), 0, 70, "...") }}</strong></p>
                            <blockquote class="blockquote">
                                <p>{{ mb_strimwidth($article->contenu, 0, 400, "...") }}</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                <cite title="Source Title">{{ $article->auteur }}</cite>
                                <p>{{ $article->date }}</p>
                            </figcaption>
                        </figure>
                        <a href="{{ route('forum.show', $article->id) }}" class="btn btn-link rounded-pill m-2">@lang('lang.texte_liste_article_suite')</a>
                        <br>
                    </div>
                    @endif
                    @empty
                    <p class="text-danger">@lang('lang.texte_liste_article_aucun')</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Table End -->
@endsection