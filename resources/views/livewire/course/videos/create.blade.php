<div class="mt-5 bg-white rounded-lg shadow">
    <div class="flex-1 pl-5 overflow-hidden">
        <hr class="mt-6 border-b-1 border-blueGray-300">
        <h6 class="mt-3 mb-6 text-sm font-bold text-center text-blue-500 uppercase">
            Contenido del Curso: {{ $item['title'] }}
        </h6>
        <div class="flex flex-wrap">
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative w-full mb-3">
                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                        Titulo
                    <input type="text" wire:model.live='title'
                        class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative w-full mb-3">
                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                        Descripción
                    </label> 
                    <textarea id="message" rows="4" wire:model.live='description'
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 "></textarea>

                </div>
            </div>


        </div>

        <span class="text-red-600">
            @error('newVideo')
                {{ $message }}
            @enderror
        </span>
        <div class="block w-full overflow-x-auto">
            <button wire:click="addvideo" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Nuevo Video</button>

            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle bg-blueGray-50 text-blueGray-500">Titulo</th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle bg-blueGray-50 text-blueGray-500">Descripción</th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle bg-blueGray-50 text-blueGray-500">Url</th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle bg-blueGray-50 text-blueGray-500">Categoria</th>
                        <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle bg-blueGray-50 text-blueGray-500">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($videos))
                        <tr>
                            <td colspan="4" class="p-4 text-center text-blueGray-500">No exiten videos en este curso.</td>
                        </tr>
                    @else
                        @foreach ($videos as $index => $row)
                            <tr>
                                <td class="p-4 px-6">
                                    <input type="text" wire:model.live="videos.{{ $index }}.title" placeholder="Título"
                                           class="w-full px-3 py-3 text-sm bg-white border-0 rounded shadow placeholder-blueGray-300">
                                </td>
                                <td class="p-4 px-6">
                                    <input type="text" wire:model.live="videos.{{ $index }}.description" placeholder="Descripción"
                                           class="w-full px-3 py-3 text-sm bg-white border-0 rounded shadow placeholder-blueGray-300">
                                </td>
                                <td class="p-4 px-6">
                                    <input type="text" wire:model.live="videos.{{ $index }}.url" placeholder="URL"
                                           class="w-full px-3 py-3 text-sm bg-white border-0 rounded shadow placeholder-blueGray-300">
                                </td>
                                <td class="p-4 px-6">
                                    <select wire:model.live="videos.{{ $index }}.category_id"
                                            class="w-full px-3 py-3 text-sm bg-white border-0 rounded shadow placeholder-blueGray-300">
                                        <option value="" disabled>Seleccione una categoría</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="p-4 px-6">
                                    <button wire:click='removeVideo({{ $index }})' class="mr-4 text-red-400" title="Eliminar">
                                        <span class="material-icons-outlined">
                                            delete_forever
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex justify-center w-full p-5 text-center ">
            <div class="p-4">
                <button wire:click="$dispatch('closeModal', true)"
                    class="flex   justify-center rounded-md bg-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-300">Cancelar</button>
            </div>
            <div class="p-4">
                <button type="button" wire:click='save'
                    class="flex  justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-300">Guardar</button>
            </div>
        </div>

    </div>
</div>
