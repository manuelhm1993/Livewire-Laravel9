<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Llamar al componente show-posts, pero solo se deben usar en secciones dinámicas --}}
            {{-- Enviar parámetros al componente, en un array asociativo --}}
            @livewire('show-posts', ['title' => 'Este es un título de prueba'])

            {{-- Llamar a un componente dentro de una carpeta especificada nav. --}}
            {{-- @livewire('nav.show-posts') --}}
            {{-- Para secciones que se repiten, se deben usar los componentes blade --}}
        </div>
    </div>
</x-app-layout>
