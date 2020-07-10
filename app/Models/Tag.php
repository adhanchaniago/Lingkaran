<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Menambah kolom yang bisa di input ke database
    protected $fillable = [
        'title', 'slug'
    ];

    // Membuat relasi "many to many" antar table tags dan posts
    public function posts()
    {
        return $this->belongsToMany(Post::class)
            ->where('status', 1);
    }

    // Deklarasi link yang tampil di url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
