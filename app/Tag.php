<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title', 'slug'];

    function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
