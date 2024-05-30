<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function sauvegarde(Request $request, $articleId)
    {
        $validated = $request->validate([
            'contenu' => 'required',
            'nom_complet_auteur' => 'required'
        ]);

        $validated['article_id'] = $articleId;
        Commentaire::create($validated);

        return redirect()->route('articles.show', $articleId);
    }
}
