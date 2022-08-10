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
                    <h6 class="mb-4">@lang('lang.texte_liste_titre_document')</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('lang.texte_titre')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $document)
                                @if($langueLocal==$document->langue)
                                <tr>
                                    <td>
                                        {{ mb_strimwidth(ucfirst($document->titre), 0, 70, "...") }}
                                        <br>
                                        <small>{{ $document->date }}, {{ $document->auteur }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ url('/') }}/uploads/{{ $document->file_name }}" class="btn btn-primary m-2">@lang('lang.texte_btn_telecharger')</a>
                                        @if($document->etudiant_id == $etudiant->id)
                                        <a href="{{ route('document.edit', $document->id) }}" class="btn btn-primary m-2">@lang('lang.texte_btn_modifier')</a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @empty
                                    <tr><td class="text-danger">@lang('lang.texte_liste_document_aucun')</td></tr>
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