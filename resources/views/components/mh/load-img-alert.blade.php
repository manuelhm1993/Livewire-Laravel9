<div>
    <div wire:loading wire:target="image" class="mb-4 bg-red-100 border-red400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="font-bold">Cargando imagen.</span>
        <span class="block sm:inline">Espere un momento mientras se procesa la imagen.</span>
    </div>
    
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="Imagen seleccionada" class="mb-4">
    @elseif (isset($post))
        <img src="{{ Storage::url($post->image) }}" alt="Imagen por defecto">
    @endif
</div>