<div>
    <x-danger-button wire:click="$set('open', 'true')">
        Crear nuevo post
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot:title>
            titulo
        </x-slot:title>

        <x-slot:content>
            Contenido
        </x-slot:content>

        <x-slot:footer>
            Pie
        </x-slot:footer>
    </x-dialog-modal>
</div>
