<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class ShowPosts extends Component
{
    // --------------- Este método renderiza el contenido dentro del componente show-posts
    public function render()
    {
        $posts = Post::all();

        return view('livewire.show-posts', compact('posts'));
        // --------------- Se puede especificar el layout del que se extiende
        // ->layout('layouts.base');
    }
}
