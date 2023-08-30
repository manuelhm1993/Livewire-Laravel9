<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

// ----------- Esta clase permite subir imágenes al servidor (es un trait)
use Livewire\WithFileUploads;

// ----------- Clase personalizada para crear un id alphanumérico
use App\MH\Classes\Helper;

class CreatePost extends Component
{
    // ----------- Uso o "herencia" del trait
    use WithFileUploads;

    // ----------- Propiedad para mostrar u ocultar el modal de creación de post
    public $open = false;
    public $title, $content;

    // ----------- Propiedades para almacenar la imagen de turno y resetear su input luego de enviar el form
    public $image, $identificador;

    // ----------- Propiedad para establecer las reglas de validación, debe ser protected
    protected $rules = [
        'title'   => 'required',
        'content' => 'required',
        'image'   => 'required|image|max:2048',
    ];

    public function resetFields() {
        // ----------- Resetear las variables luego de crear el post
        $this->reset(['open', 'title', 'content', 'image']);

        // ----------- Resetear el input file, ya que es inmutable
        $this->identificador = Helper::generateID();
    }

    // ----------- Guarda el nuevo post
    public function store() {
        // ----------- Llamar a las reglas de validación, igual que crear una clase Request o request->validate();
        $validatedData = $this->validate();

        // ----------- Almacenar la imagen dentro de la carpeta post y usando el disco public
        $newImage = $this->image->store('posts', 'public');

        // ----------- Sobreescribir el elemento image para almacenar solo el path y no el objeto Livewire\WithFileUploads
        $validatedData['image'] = $newImage;

        // ----------- Si se pasa la validación, el método validate, devuelve un array key:value
        Post::create($validatedData);

        $this->resetFields();

        // ----------- Crear un evento para avisar a Show que se creó un nuevo post y renderize
        $this->emitTo('show-posts', 'render');//emitTo limita el evento a un solo oyente

        // ----------- Desencadena un evento de feedback usando sweetalert2
        $this->emit('feedbackSA2', '¡Post creado!', 'La acción fue ejecutada exitosamente.');
    }

    // ----------- Darle un ID con la clase personalizada Helper a esta propiedad
    public function mount() {
        $this->identificador = Helper::generateID();
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
