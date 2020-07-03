<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Menambah kolom yang bisa diinput ke database
    protected $guarded = [
        'id', 'user_id'
    ];

    // Membuat relasi "one to many" antar table profiles dan users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
