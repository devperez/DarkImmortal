<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titre',
        'groupe',
        'morceau',
        'clip',
        'article',
        'pays',
        'genre',
        'image',
    ];
    use HasFactory;
    protected $table = 'Posts';
}
