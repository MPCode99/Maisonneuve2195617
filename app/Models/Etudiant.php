<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'adresse', 'phone', 'email', 'date_naissance', 'ville_id', 'user_id'];
}
