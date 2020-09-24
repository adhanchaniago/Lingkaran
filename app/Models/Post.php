<?php

namespace App\Models;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Post extends Model implements Viewable
{
    use InteractsWithViews;

    protected $removeViewsOnDelete = true;

    protected $guarded = ['id'];

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

    // Membuat relasi polymorphic antar table posts dan comments
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    // Deklarasi link yang tampil di url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
