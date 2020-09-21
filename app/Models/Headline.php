<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    protected $guarded = ['id'];

    // Membuat relasi "One to One" antar table headlines dan posts
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
