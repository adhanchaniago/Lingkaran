<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Menambah kolom yang bisa diinput ke database
    protected $fillable = [
        'image', 'address', 'phone'
    ];

    // Membuat relasi "one to many" antar table profiles dan users
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
