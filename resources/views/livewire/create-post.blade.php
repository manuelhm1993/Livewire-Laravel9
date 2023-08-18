<div>
    {{-- Poner a la escucha del click y usar un método mágico para establecer la propiedad open --}}
    <x-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-danger-button>

    {{-- Vincultar la propiedad open --}}
    <x-dialog-modal wire:model="open">
        <x-slot:title>
            Crear nuevo post
        </x-slot:title>

        <x-slot:content>
            <div class="mb-4">
                {{-- Hacer uso de los componentes de jetstream para facilitar la maquetación --}}
                <x-label value="Título del post" />
                <x-input type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />
                
                {{-- Utilizar las clases de tailwind para crear un form-control personal y aplicarlo a un texarea común --}}
                <textarea name="" id="" rows="6" class="form-control w-full"></textarea>
            </div>
        </x-slot:content>

        <x-slot:footer>
            {{-- Botón de acción para cerrar el modal --}}
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            {{-- Botón de acción para crear un nuevo post --}}
            <x-danger-button>
                Crear post
            </x-danger-button>
        </x-slot:footer>
    </x-dialog-modal>
</div>
