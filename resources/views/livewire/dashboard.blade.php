<div class="px-2 pb-4 ml-12 duration-500 ease-in-out transform content md:px-5 ">
    <div class="flex flex-col my-2 sm:flex-row">
        <div class="w-full px-4 lg:w-1/3" wire:ignore>
            <div class="relative w-full mb-3">
                <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600" htmlfor="grid-password">
                    Categorias
                </label>
                <select id="select2"
                    class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                    multiple="multiple">
                    @foreach ($categories as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full px-4 lg:w-1/3" wire:ignore>
            <div class="relative w-full mb-3">
                <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600" htmlfor="grid-password">
                    Rango de Edad
                </label>
                <select id="select3"
                    class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                    multiple="multiple">
                    @foreach ($ages as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->range }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full px-4 lg:w-1/4">
            <div class="relative w-full mb-3">
                <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600" htmlfor="grid-password">
                    Buscar
                </label>
                <input wire:model.live='search' placeholder="Buscar"
                    class="w-full px-2 py-2 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">

            </div>
        </div>
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

                                        <div class="flex items-center flex-none w-full text-sm font-bold text-gray-600">
                                        </div>
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
                                                            45 Inscritos
                                                        </span>
                                                    </li>
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
                                        @role('user')

                                        @if(Auth::user()->courses->contains('id', $item->id))
                                            <button
                                                class="inline-flex items-center px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white transition duration-300 ease-in bg-green-500 rounded-full md:mb-0 hover:shadow-lg hover:bg-purple-600">
                                                Registrado
                                            </button>
                                        @else
                                            <button wire:click='register({{ $item->id }})'
                                                class="inline-flex items-center px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white transition duration-300 ease-in bg-purple-500 rounded-full md:mb-0 hover:shadow-lg hover:bg-purple-600">
                                                Registrarme
                                            </button>
                                        @endif
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



@script
<script>
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function() {
            let data = $(this).val();
            @this.category = data;
        });

    });
    $(document).ready(function() {
        $('#select3').select2();
        $('#select3').on('change', function(e) {
            let data = $(this).val();
            @this.age = data;
        });

    });
</script>
@endscript
