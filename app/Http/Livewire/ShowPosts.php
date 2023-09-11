<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Trait para cargar imágenes
use Livewire\WithPagination; //  Trait para hacer paginaciones reactivas

use App\MH\Classes\Helper;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    // --------------- Propiedades del componente
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    // Editar un post
    public $post, $open_edit = false, $image, $identificador;

    // Permite vinvular las propiedades directamente en un input
    protected $rules = [
        'post.title'   => 'required',
        'post.content' => 'required',
    ];

    // --------------- Oyentes de eventos
    //
    // Nombre del evento y método que lo escucha, el evento render, ejecuta el método render
    protected $listeners = ['render'];

    // --------------- Este método renderiza el contenido dentro del componente show-posts
    public function render()
    {
        // --------------- Campo de búsqueda por título y contenido
        $posts = Post::where('title', 'like', "%{$this->search}%")
                     ->orWhere('content', 'like', "%{$this->search}%")
                     ->orderBy($this->sort, $this->direction)
                     ->paginate(10);

        return view('livewire.show-posts', compact('posts'));
        // --------------- Se puede especificar el layout del que se extiende
        // ->layout('layouts.base');
    }

    // --------------- Este método se encarga de ordenar los registros
    public function order($sort) {
        // --------------- Alterna entre ascendente y descendente
        if($this->sort === $sort) {
            $this->direction = ($this->direction === 'desc') ? 'asc' : 'desc';
        }
        else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Post $post) {
        $this->post = $post;
        $this->open_edit = true;
        $this->identificador = Helper::generateID();
    }

    public function update() {
        // El método validate permite llenar el post con los nuevos datos si pasan la validación
        $this->validate();

        // Validar si se seleccionó una nueva imagen
        if($this->image) {
            // Eliminar la imagen actual del post
            Storage::disk('public')->delete($this->post->image);

            // Guardar la nueva imagen en el directorio posts posts y modificar la url del post
            $this->post->image = $this->image->store('posts', 'public');
        }

        $this->post->save();
        $this->resetFields();
        $this->emit('feedbackSA2', '¡Post actualizado!', 'La acción fue ejecutada exitosamente.');
    }

    // ----------- Resetear las propiedades del componente
    public function resetFields() {
        $this->reset(['open_edit', 'image']);
        $this->identificador = Helper::generateID();
    }

    // Resetear filtrados de búsqueda con el trait de paginación
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
