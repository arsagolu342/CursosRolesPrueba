<div class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
    <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
        <hr class="mt-6 border-b-1 border-blueGray-300">
        <h6 class="mt-3 mb-6 text-sm font-bold text-center text-blue-500 uppercase">
            Nuevo Curso
        </h6>
        <div class="flex flex-wrap">
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative w-full mb-3">
                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                        Titulo
                    </label>
                    <span class="text-red-600">@error('title'){{ $message }}@enderror</span>
                    <input type="text" wire:model.live='title'
                        class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative w-full mb-3">
                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                        Descripción
                    </label>
                    <span class="text-red-600">@error('description'){{ $message }}@enderror</span>
                    <textarea id="message" rows="4" wire:model.live='description'
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 "></textarea>

                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative w-full mb-3">
                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                        Categoria
                    </label>
                    <span class="text-red-600">@error('category_id'){{ $message }}@enderror</span>
                    <select type="text" wire:model.live='category_id'
                        class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                        placeholder="Especie">
                        <option value=""> Seleccione...</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="relative w-full mb-3">
                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
                        Rango de Edad
                    </label>
                    <span class="text-red-600">@error('age_id'){{ $message }}@enderror</span>
                    <select type="text" wire:model.live='age_id'
                        class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                        placeholder="Especie">
                        <option value=""> Seleccione...</option>
                        @foreach ($ages as $item)
                            <option value="{{ $item->id }}">{{ $item->range }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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
    <x-loader target="save" />
    
</div>
