<div>
    {{-- Para que el renderizado reactivo funcione, todo el contenido debe estar dentro de un div padre --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hola {{ $name }}
        </h2>
    </x-slot>
</div>
