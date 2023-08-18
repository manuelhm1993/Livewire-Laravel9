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

        // ----------- Resetear las variables luego de crear el post
        $this->reset(['open', 'title', 'content']);

        // ----------- Crear un evento para avisar a Show que se creó un nuevo post y renderize
        $this->emitTo('show-posts' , 'store');//emitTo limita el evento a un solo oyente

        // ----------- Desencadena un evento de feedback usando sweetalert2
        $this->emit('feedbackSA2', 'La acción fue ejecutada exitosamente.');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
