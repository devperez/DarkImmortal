<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'groupe',
        'morceau',
        'clip',
        'article',
        'pays',
        'genre',
        'image',
        'album',
        'couv',
        'paroles',
    ];
    use HasFactory;
    protected $table = 'Posts';

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->article, 50, ' >>>>');
    }

    public function getVeryShortDescriptionAttribute()
    {
        return Str::words($this->article,20, '>>>>>');
    }
}