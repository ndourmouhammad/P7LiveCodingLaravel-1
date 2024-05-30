<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet_auteur',
        'contenu',
        'article_id'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
