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
            @php
                $listaErrores = $errors->all();
            @endphp

            @if ($errors->any())
                <div class="max-w-lg mx-auto">
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        <div>
                            <h5>Errores en el formulario:</h5>
                            <ul>
                                @foreach ($listaErrores as $i => $error)
                                <li>
                                    <span class="font-medium">{{ ($i + 1) . '.' }} </span> {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mb-4">
                {{-- Hacer uso de los componentes de jetstream para facilitar la maquetación --}}
                <x-label value="Título del post" />

                {{-- Sincronizar el formulario con las propiedades el componente --}}
                <x-input type="text" class="w-full" wire:model.defer="title" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />
                {{-- Para evitar el renderizado de la vista por cada letra que se escribe en los inputs se usa wire:model.defer --}}

                {{-- Utilizar las clases de tailwind para crear un form-control personal y aplicarlo a un texarea común --}}
                <textarea name="" id="" rows="6" class="form-control w-full" wire:model.defer="content"></textarea>
            </div>
        </x-slot:content>

        <x-slot:footer>
            {{-- Botón de acción para cerrar el modal --}}
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            {{-- Botón de acción para crear un nuevo post --}}
            <x-danger-button wire:click="store">
                Crear post
            </x-danger-button>
        </x-slot:footer>
    </x-dialog-modal>
</div>
