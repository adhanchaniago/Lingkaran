<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Menambah kolom yang bisa di input ke database
    protected $fillable = [
        'title', 'slug', 'color'
    ];

    // Membuat relasi "Many to One" antar table categories dan posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Deklarasi link yang tampil di url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
