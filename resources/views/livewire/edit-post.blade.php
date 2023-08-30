<div>
    {{-- Atajo para modificar el valor de una propiedad, acción mágica --}}
    {{-- <a class="btn btn-success" wire:click="$set('open', true)"> --}}
    
    {{-- Si la propiedad es boolean, se puede usar el magic action $toogle --}}
    <a class="btn btn-success" wire:click="$toggle('open')">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot:title>
            Editar el post
        </x-slot:title>

        <x-slot:content>
            <x-mh.load-img-alert :image="$image" :post="$post" />

            <div class="mb-4">
                <x-label value="Título del post" />
                {{-- Para vincular las propiedades directamente en un input, se deben crear las rules --}}
                <x-input wire:model.defer="post.title" type="text" class="w-full" />
                <x-input-error for="post.title" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />
                <textarea wire:model.defer="post.content" rows="6" class="form-control w-full"></textarea>
                <x-input-error for="post.content" />
            </div>

            <div class="mb-4">
                <input type="file" wire:model.defer="image" id="{{$identificador}}">
                <x-input-error for="post.image" />
            </div>
        </x-slot:content>

        <x-slot:footer>
            <x-secondary-button wire:click="$toggle('open')" class="me-1">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>
        </x-slot:footer>
    </x-dialog-modal>
</div>
