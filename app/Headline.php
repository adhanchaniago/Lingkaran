<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    // Menambah kolom yang dapat di input ke database
    protected $fillable = [
        'post_id', 'type'
    ];

    // Membuat relasi "One to One" antar table headlines dan posts
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
