<div class="px-2 pb-4 ml-12 duration-500 ease-in-out transform content md:px-5 ">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 uppercase">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>

    <div class="container py-8 mx-auto" wire:poll>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
            @if ($videos    != null)
                @foreach ($videos   as $item)
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
                                    <div class="flex justify-start space-x-2 text-sm font-medium">

                                            <button  onclick="Livewire.dispatch('openModal', { component: 'course.videos.view', arguments: { item: {{ $item }}}})"
                                                class="inline-flex items-center px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white transition duration-300 ease-in bg-green-500 rounded-full md:mb-0 hover:shadow-lg hover:bg-purple-600">
                                                Ver
                                            </button>
                                            @if (Auth::user()->progress()->where('video_id', $item['id'])->exists())
                                            <button  onclick="Livewire.dispatch('openModal', { component: 'course.videos.view', arguments: { item: {{ $item }}}})"
                                                    class="inline-flex items-center px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white transition duration-300 ease-in bg-green-500 rounded-full md:mb-0 hover:shadow-lg hover:bg-purple-600">
                                                    Visto
                                                </button>
                                            @endif
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
