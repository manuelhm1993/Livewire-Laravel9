<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    // ----------- Propiedad para mostrar u ocultar el modal de creación de post
    public $open = false;
    public $title, $content;

    // ----------- Guarda el nuevo post
    public function store() {
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
