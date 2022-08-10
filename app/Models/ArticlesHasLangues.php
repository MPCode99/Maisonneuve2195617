<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesHasLangues extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'langue_id', 'titre', 'contenu'];
}
