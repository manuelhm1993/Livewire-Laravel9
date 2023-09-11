<div>
    {{-- Aplicar el centrado del navigation-menu.blade.php --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-mh.table>
            <div class="px-6 py-4 flex items-center">
                {{-- Selector para establecer el número de intems a mostrar por página --}}
                <div class="flex items-center text-gray-600">
                    <span>Mostrar</span>

                    <select class="form-control mx-2">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span>Entradas</span>
                </div>

                {{-- Input para buscar elementos --}}
                <x-input class="flex-1 mx-4" type="text" placeholder="Buscar..." wire:model="search" />

                {{-- Botón y modal para crear posts --}}
                @livewire('create-post')
            </div>

            {{-- Mostrar el contenido si existen registros --}}
            @if ($posts->count())
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            {{-- Desencadena el evento click y llama a order --}}
                            <th wire:click="order('id')"
                                scope="col"
                                class="w-24 cursor-pointer px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="float-left mt-1">
                                    {{ __('ID') }}
                                </div>

                                {{-- Componente blade para validar el icono de ordenamiento con los parametros sort y direction --}}
                                <x-mh.icon-arrow-sort sort="id" direction="asc" />
                            </th>
                            <th wire:click="order('title')"
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="float-left mt-1">
                                    {{ __('Title') }}
                                </div>

                                <x-mh.icon-arrow-sort sort="title" direction="asc" />
                            </th>
                            <th wire:click="order('content')"
                                class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="float-left mt-1">
                                    {{ __('Content') }}
                                </div>

                                <x-mh.icon-arrow-sort sort="content" direction="asc" />
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->id }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->title }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->content }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{-- Agregar un botón para no cargar 100 modales, simplemente uno que reciba parámetros --}}
                                    {{-- Al hacer click se llama al método edit del Componente ShowPost --}}
                                    <a class="btn btn-success" wire:click="edit({{ $item }})">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
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

            {{-- Validar si existen suficientes elementos para paginar y mostra los links --}}
            @if ($posts->hasPages())
                {{-- Links de paginación --}}
                <div class="px-6 py-3">
                    {{ $posts->links() }}
                </div>
            @endif
        </x-mh.table>
    </div>

    {{-- Componente modal para editar un post --}}
    <x-mh.edit-post :image="$image" :post="$post" :identificador="$identificador" />
</div>
