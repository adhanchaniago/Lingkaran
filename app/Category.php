<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'color'];

    function getRouteKeyName()
    {
        return 'slug';
    }
}
