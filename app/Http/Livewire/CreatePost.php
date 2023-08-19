<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    // ----------- Propiedad para mostrar u ocultar el modal de creación de post
    public $open = false;
    public $title, $content;

    // ----------- Propiedad para establecer las reglas de validación, debe ser protected
    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required|min:6',
    ];

    // ----------- Guarda el nuevo post
    public function store() {
        // ----------- Llamar a las reglas de validación, igual que crear una clase Request o request->validate();
        $this->validate();

        // ----------- El flujo de ejecución no llega aquí si la validación falla

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
