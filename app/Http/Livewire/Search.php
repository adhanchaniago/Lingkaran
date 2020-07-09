<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class Search extends Component
{
    public $keyword = '';
    
    public function render()
    {
        $results = [];
        (Str::length($this->keyword) > 0)
            ? $results = Post::where('title', 'like', '%' . $this->keyword . '%')->get()
            : '';

        return view('livewire.search', [
            'results' => collect($results)->take(20),
        ]);
    }
}
