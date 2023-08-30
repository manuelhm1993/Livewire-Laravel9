<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class EditPost extends Component
{
    // Las propiedades se asignan dinámicamente desde la vista, pero se deben llamar igual que el parámetro
    public $post;
    public $open = false;

    // Permite vinvular las propiedades directamente en un input
    protected $rules = [
        'post.title'   => 'required',
        'post.content' => 'required',
    ];

    // Si se desea realizar algún otro tratamiento, se usa el método mount en lugar de un constructor ya que solo se llama una vez
    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
