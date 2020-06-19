<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    function user_author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    function user_editor()
    {
        return $this->belongsTo(User::class, 'editor');
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    function getRouteKeyName()
    {
        return 'slug';
    }
}
