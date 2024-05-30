<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use PDO;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(12); //récupération des donnees
        // $articles = Article::paginate(12); //récupération des donnees
        return view('articles.index', ['articles' => $articles]);
    }

    // public function detail($id)
    // {
    //     $commentaires = Commentaire::paginate(2)->where('article_id', $id);
    //     $article = Article::find($id);
    //     return view('articles.detail', [
    //         'article' => $article,
    //         'commentaires' => $commentaires
    //     ]);

    //     //  Article::all() => Select * from articles;
    //     //  Article::find() => Select * from articles where id = id

    // }
    public function detail($id)
{
    $article = Article::findOrFail($id);
    $commentaires = Commentaire::where('article_id', $id)->paginate(2);

    return view('articles.detail', [
        'article' => $article,
        'commentaires' => $commentaires
    ]);
}


    public function partager()
    {
        return view('articles.partager');
    }

    public function sauvegarde(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'a_la_une' => 'required',
            'url_image' => 'required',
        ]);

        Article::create($request->all());


        // $article = new Article();
        // $article->nom = $request->nom_article;
        // $article->description = $request->description;
        // $article->url_image = $request->url_image_article;
        // $article->a_la_une = false;
        // $article->save();


        return redirect('/articles');
        // Article::create();
    }
}
