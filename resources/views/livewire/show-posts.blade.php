<div>
    {{-- Para que el renderizado reactivo funcione, todo el contenido debe estar dentro de un div padre --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Aplicar el centrado del navigation-menu.blade.php --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            {{-- Input para buscar elementos --}}
            <div class="px-6 py-4">
                {{-- <input type="text" wire:model="search"> --}}

                {{-- Usar el componente input de jetstream --}}
                <x-input class="w-full" type="text" placeholder="Buscar..." wire:model="search" />
            </div>

            {{-- Mostrar el contenido si existen registros --}}
            @if ($posts->count())
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            {{-- Desencadena el evento click y llama a order --}}
                            <th wire:click="order('id')"
                                class="w-20 cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                {{ __('ID') }}

                                {{-- Componente blade para validar el icono de ordenamiento con los parametros sort y direction --}}
                                <x-icon-arrow-sort sort="id" direction="asc" />
                            </th>
                            <th wire:click="order('title')"
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                {{ __('Title') }}

                                <x-icon-arrow-sort sort="title" direction="asc" />
                            </th>
                            <th wire:click="order('content')"
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                {{ __('Content') }}

                                <x-icon-arrow-sort sort="content" direction="asc" />
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $post->id }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $post->title }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $post->content }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Activo</span>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Feedback en caso de no haber registros --}}
            @else
                <div class="px-6 py-4">
                    No se encontraron coincidencias que mostrar
                </div>
            @endif
        </x-table>
    </div>
</div>
