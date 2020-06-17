<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    protected $fillable = ['post_id', 'type'];

    function post()
    {
        return $this->belongsTo(Post::class);
    }
}
