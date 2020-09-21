<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['id'];

    // Membuat relasi "many to many" antar table tags dan posts
    public function posts()
    {
        return $this->belongsToMany(Post::class)
            ->where('is_published', true);
    }

    // Deklarasi link yang tampil di url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
