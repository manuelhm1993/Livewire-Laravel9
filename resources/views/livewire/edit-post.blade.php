<div>
    {{-- Atajo para modificar el valor de una propiedad, acción mágica --}}
    {{-- <a class="btn btn-success" wire:click="$set('open', true)"> --}}
    
    {{-- Si la propiedad es boolean, se puede usar el magic action $toogle --}}
    <a class="btn btn-success" wire:click="$toggle('open')">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot:title>
            Editar el post: {{ $post->title }}
        </x-slot:title>

        <x-slot:content>

        </x-slot:content>

        <x-slot:footer>

        </x-slot:footer>
    </x-dialog-modal>
</div>
