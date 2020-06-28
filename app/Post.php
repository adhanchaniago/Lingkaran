<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Menambah kolom yang tidak bisa di input ke database
    protected $guarded = [
        'id'
    ];

    // Membuat relasi "one to many inverse" antar table posts dan categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Membuat relasi "one to many inverse" antar table posts dan users
    public function user_author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function user_editor()
    {
        return $this->belongsTo(User::class, 'editor');
    }

    // Membuat relasi "many to many" antar table posts dan tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Deklarasi link yang tampil di url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
