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

                {{-- Sincronizar el formulario con las propiedades el componente --}}
                <x-input type="text" class="w-full" wire:model.defer="title" />

                {{-- Llamar al componente de validación de input jetstream --}}
                <x-input-error for="title" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />
                {{-- Para evitar el renderizado de la vista por cada letra que se escribe en los inputs se usa wire:model.defer --}}

                {{-- Utilizar las clases de tailwind para crear un form-control personal y aplicarlo a un texarea común --}}
                <textarea name="" id="" rows="6" class="form-control w-full" wire:model.defer="content"></textarea>

                {{-- Llamar al componente de validación de input jetstream --}}
                <x-input-error for="content" />
            </div>
        </x-slot:content>

        <x-slot:footer>
            {{-- Botón de acción para cerrar el modal --}}
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            {{-- Escucha el click y llama al método store y en el proceso se remueve y muestra el spinner --}}
            <x-danger-button wire:click="store" wire:loading.remove wire:target="store">
                Crear post
            </x-danger-button>

            {{-- wire:loading pone d-none al elemento y wire:target muestra el elemento en la acción especificada --}}
            <div wire:loading wire:target="store" class="animate-spin inline-block w-10 h-10 border-[3px] border-current border-t-transparent text-red-600 rounded-full"
                role="status" aria-label="loading">
                <span class="sr-only">Loading...</span>
            </div>
        </x-slot:footer>
    </x-dialog-modal>
</div>
