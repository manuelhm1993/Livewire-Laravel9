<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class ShowPosts extends Component
{
    // --------------- Propiedades del componente
    public $search;

    // --------------- Este método renderiza el contenido dentro del componente show-posts
    public function render()
    {
        // --------------- Campo de búsqueda por título y contenido
        $posts = Post::where('title', 'like', "%{$this->search}%")
                     ->orWhere('content', 'like', "%{$this->search}%")
                     ->get();

        return view('livewire.show-posts', compact('posts'));
        // --------------- Se puede especificar el layout del que se extiende
        // ->layout('layouts.base');
    }
}
