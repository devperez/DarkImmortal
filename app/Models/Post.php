<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'album',
    ];
    use HasFactory;
    protected $table = 'Posts';

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->article, 50, ' >>>>');
    }
}