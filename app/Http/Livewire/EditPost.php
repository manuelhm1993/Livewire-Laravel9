<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\MHClasses\Helper;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    use WithFileUploads;

    // Las propiedades se asignan dinámicamente desde la vista, pero se deben llamar igual que el parámetro
    public $post;
    public $open = false;
    public $image, $identificador;

    // Permite vinvular las propiedades directamente en un input
    protected $rules = [
        'post.title'   => 'required',
        'post.content' => 'required',
    ];

    // ----------- Resetear las propiedades del componente
    public function resetFields() {
        $this->reset(['open', 'image']);
        $this->identificador = Helper::generateID();
    }

    // Si se desea realizar algún otro tratamiento, se usa el método mount en lugar de un constructor ya que solo se llama una vez
    public function mount(Post $post)
    {
        $this->post = $post;
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
 
        // Se usa save para actualizar, ya que guarda los cambios en el objeto Post
        $this->post->save();

        $this->resetFields();

        $this->emitTo('show-posts', 'render');

        $this->emit('feedbackSA2', '¡Post actualizado!', 'La acción fue ejecutada exitosamente.');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
