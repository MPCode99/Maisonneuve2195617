<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Article;
use App\Models\ArticlesHasLangues;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ArticlesHasLangues::select('langues.nom as langue', 'etudiant_id', 'article_id as id', 'titre', 'contenu', 'articles.date', 'etudiants.name as auteur')
                    ->join('langues', 'articles_has_langues.langue_id', '=', 'langues.id')
                    ->join('articles', 'articles_has_langues.article_id', '=', 'articles.id')
                    ->join('etudiants', 'articles.etudiant_id', '=', 'etudiants.id')
                    ->orderBy('articles.date', 'desc')->get();
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        return view('forum.articles', ['articles' => $articles, 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){$name = Auth::user()->name;}
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        $langues = Langue::all();
        return view('forum.create', ['langues' => $langues, 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Article  $article
     * @param  \Illuminate\Http\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article, Etudiant $etudiant)
    {
        $request->validate([
            'titre' => 'required|min:2|max:255',
            'contenu' => 'required|min:2',
            'date' => 'required|date_format:Y-m-d',
            'langue_id' => 'required|min:1|max:3'
        ]);
        if(Auth::check()) {$id = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $id)->get();
        $etudiant = $etudiant[0];
        $article = new Article;
        $article->date = $request->date;
        $article->etudiant_id = $etudiant->id;
        $article->save();
        ArticlesHasLangues::create([
            'article_id' => $article->id,
            'langue_id' => $request->langue_id,
            'titre' => $request->titre,
            'contenu' => $request->contenu
        ]);
        return redirect(route('forum.articles', $article->etudiant_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $articleId = $article->id;
        $article = ArticlesHasLangues::select('etudiant_id', 'article_id as id', 'titre', 'contenu', 'articles.date', 'etudiants.name as auteur')
                    ->join('articles', 'articles_has_langues.article_id', '=', 'articles.id')
                    ->join('etudiants', 'articles.etudiant_id', '=', 'etudiants.id')
                    ->WHERE('articles.id', $articleId)->get();
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$idAuth = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $idAuth)->get();
        $etudiant = $etudiant[0];
        return view('forum.show', ['article' => $article[0], 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $articleId = $article->id;
        $article = ArticlesHasLangues::select('langue_id', 'etudiant_id', 'titre', 'contenu', 'articles.date', 'etudiants.name as auteur')
                    ->join('articles', 'articles_has_langues.article_id', '=', 'articles.id')
                    ->join('etudiants', 'articles.etudiant_id', '=', 'etudiants.id')
                    ->WHERE('articles.id', $articleId)->get();
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$idAuth = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $idAuth)->get();
        $etudiant = $etudiant[0];
        $langues = Langue::all();
        return view('forum.edit', ['langues' => $langues, 'article' => $article[0], 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre' => 'required|min:2|max:255',
            'contenu' => 'required|min:2',
            'date' => 'required|date_format:Y-m-d',
            'langue_id' => 'required|min:1|max:3'
        ]);
        $id = $article->id;
        Article::where('id', $id)->update([
            'date' => $request['date']
        ]);
        ArticlesHasLangues::where('article_id', $id)->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'langue_id' => $request->langue_id
        ]);
        return redirect(route('forum.edit', $article->id));
    }

    /**
     * Show the form for translate a specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function translate(Article $article)
    {
        $articleId = $article->id;
        $article = ArticlesHasLangues::select('langue_id', 'etudiant_id', 'titre', 'contenu', 'articles.date', 'etudiants.name as auteur')
                    ->join('articles', 'articles_has_langues.article_id', '=', 'articles.id')
                    ->join('etudiants', 'articles.etudiant_id', '=', 'etudiants.id')
                    ->WHERE('articles.id', $articleId)->get();
        if(Auth::check()) {$name = Auth::user()->name;}
        if(Auth::check()) {$idAuth = Auth::user()->id;}
        $etudiant = Etudiant::select('etudiants.id')
                    ->join('users', 'etudiants.user_id', '=', 'users.id')
                    ->WHERE('users.id', $idAuth)->get();
        $etudiant = $etudiant[0];
        $langues = Langue::all();
        return view('forum.translate', ['langues' => $langues, 'article' => $article[0], 'name' => $name, 'etudiant' => $etudiant]);
    }

    /**
     * Store a translate created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function storeTranslate(Request $request, Article $article)
    {
        $request->validate([
            'titre' => 'required|min:2|max:255',
            'contenu' => 'required|min:2',
            'langue_id' => 'required|min:1|max:3'
        ]);
        ArticlesHasLangues::create([
            'article_id' => $article->id,
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'langue_id' => $request->langue_id
        ]);
        return redirect(route('forum.articles', $article->etudiant_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $id = $article->id;
        ArticlesHasLangues::where('article_id', $id)->delete();
        $article->delete();
        return redirect(route('forum.articles'));
    }
}
