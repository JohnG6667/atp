<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Modal extends Component
{
    public function render()
    {
        $news = Post::all();

        return view('livewire.modal', compact('news'));
    }
}
