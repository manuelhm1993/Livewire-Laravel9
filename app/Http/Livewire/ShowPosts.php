<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    // --------------- Este método renderiza el contenido dentro del componente show-posts
    public function render()
    {
        return view('livewire.show-posts');
        // --------------- Se puede especificar el layout del que se extiende
        // ->layout('layouts.base');
    }
}
