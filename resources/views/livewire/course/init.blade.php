<div class="px-2 pb-4 ml-12 duration-500 ease-in-out transform content md:px-5 ">
    <div class="flex flex-col my-2 sm:flex-row">

        <div class="flex items-end w-full px-4 lg:w-1/4">
            <div class="relative w-full mb-3">
                <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600" htmlfor="grid-password">
                    Buscar
                </label>
                <input wire:model.live='search' placeholder="Buscar"
                    class="w-full px-2 py-2 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">

            </div>
        </div>
        @role('admin')
            <div class="items-end justify-end w-full mb-6 pt-7">
                <button
                    class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-blue-500 rounded outline-none active:bg-rose-300 focus:outline-none"
                    type="button" onclick="Livewire.dispatch('openModal',  { component: 'course.create' } )">Crear
                    Curso</button>
            </div>
        @endrole
    </div>
    <div class="container py-8 mx-auto" wire:poll>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
            @if ($courses != null)
                @foreach ($courses as $item)
                    <div class="w-full max-w-md p-6 bg-white border-2 border-blue-500 shadow-lg rounded-xl">
                        <div class="flex flex-col">
                            <div class="relative w-full mb-3 h-62">
                                <div class="flex-auto justify-evenly">
                                    <div class="flex flex-wrap mb-4">
                                        <div class="flex items-center justify-between w-full min-w-0">
                                            <h2
                                                class="mr-auto text-lg font-bold text-gray-800 truncate cursor-pointer hover:text-purple-500">
                                                {{ $item->title }}
                                            </h2>

                                        </div>
                                        <h2
                                            class="mr-auto text-lg font-bold text-gray-800 truncate cursor-pointer hover:text-purple-500">
                                            {{ $item->description }}
                                        </h2>
                                    </div>
                                    <div class="py-4 text-sm text-gray-600 lg:flex">
                                        <div class="inline-flex items-center flex-1 mb-3">
                                            <div class="flex items-center flex-none w-full text-sm text-gray-600">
                                                <ul class="flex flex-row items-center justify-center space-x-2">

                                                    <li>
                                                        <span
                                                            class="block p-1 transition duration-300 ease-in border-2 border-gray-900 rounded-full hover:border-blue-600">
                                                            Edad: {{ $item->age->range }}
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span
                                                            class="block p-1 transition duration-300 ease-in border-2 border-gray-900 rounded-full hover:border-blue-600">
                                                            Categoria: {{ $item->category->name }}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="flex justify-start space-x-2 text-sm font-medium">
                                            @role('admin')
                                            <button  onclick="Livewire.dispatch('openModal', { component: 'course.videos.view', arguments: { item: {{ $item }}}})"
                                            class="inline-flex items-center px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white transition duration-300 ease-in bg-green-500 rounded-full md:mb-0 hover:shadow-lg hover:bg-purple-600">
                                            Ver
                                        </button>
                                            <button
                                                onclick="Livewire.dispatch('openModal', { component: 'course.videos.create', arguments: { item: {{ $item }}}})"
                                                class="inline-flex items-center px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white transition duration-300 ease-in bg-purple-500 rounded-full md:mb-0 hover:shadow-lg hover:bg-purple-600">
                                                Administrar
                                            </button>
                                            <button
                                                onclick="Livewire.dispatch('openModal', { component: 'course.students', arguments: { item: {{ $item }}}})"
                                                class="p-2 text-center text-gray-400 transition duration-300 ease-in bg-gray-700 border border-gray-700 rounded-full hover:bg-gray-800 hover:border-gray-500 hover:text-white hover:shadow-lg w-9 h-9">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>

                                        @endrole
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
