<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    // --------------- Las propiedades enviadas al componente se reciben como atributos públicos en la clase
    public $titulo;

    // --------------- Si se envían parámetros con diferente nombre, mount es un equivalente a setter
    public function mount($title) {
        $this->titulo = $title;
    }

    // --------------- Este método renderiza el contenido dentro del componente show-posts
    public function render()
    {
        return view('livewire.show-posts');
    }
}
