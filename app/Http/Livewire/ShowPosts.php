<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class ShowPosts extends Component
{
    // --------------- Propiedades del componente
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    // --------------- Este método renderiza el contenido dentro del componente show-posts
    public function render()
    {
        // --------------- Campo de búsqueda por título y contenido
        $posts = Post::where('title', 'like', "%{$this->search}%")
                     ->orWhere('content', 'like', "%{$this->search}%")
                     ->orderBy($this->sort, $this->direction)
                     ->get();

        return view('livewire.show-posts', compact('posts'));
        // --------------- Se puede especificar el layout del que se extiende
        // ->layout('layouts.base');
    }

    // --------------- Este método se encarga de ordenar los registros
    public function order($sort) {
        $this->sort = $sort;
    }
}
