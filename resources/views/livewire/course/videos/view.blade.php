<div>


    <div class="max-w-4xl p-4 mx-auto bg-white rounded-lg shadow-md">
        @role('user')
        @php
            $videoEmbedUrl = null;
            $videoEmbedUrl = str_replace('https://youtu.be/', '', $item['url']);
        @endphp

        <div>
            @if($videoEmbedUrl)
                <iframe
                    id="youtube-player"
                    width="100%"
                    height="315"
                    src="https://www.youtube.com/embed/{{ $videoEmbedUrl }}?enablejsapi=1"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen
                    class="rounded-lg">
                </iframe>

            @else
                <p>URL no válida</p>
            @endif
        </div>
        @endrole
        <div class="flex items-center mb-4 space-x-2">
            @if (Auth::user()->likes()->where('video_id', $item['id'])->exists())
                <button
                    class="flex items-center px-4 py-2 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-blue-600">
                    <span class="material-icons-outlined">
                        recommend
                    </span>
                </button>
            @else
                <button wire:click='like'
                    class="flex items-center px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    <span class="material-icons-outlined">
                        thumb_up
                    </span>
                    Me gusta
                </button>
            @endif

            <span class="text-sm font-bold text-gray-600" wire:poll>{{ $likes ?? 0 }} Likes</span>
        </div>
        <div class="mb-6">
            <h3 class="mb-2 text-lg font-semibold text-gray-800">Comentarios</h3>
            @role('user')
            <div class="flex items-center mb-4">
                <input type="text" wire:model.live='comment' placeholder="Escribe un comentario..."
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button wire:click='comm'
                    class="px-4 py-2 ml-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Comentar</button>
            </div>
            @endrole
            <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow" style="height: 350px;">
                <div class="space-y-4">
                    @foreach ($comments as $item)
                        <div class="p-4 rounded-lg shadow-sm bg-gray-50">
                            <p class="font-semibold text-gray-800">{{ $item->user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $item->comment }}</p>
                            <p class="text-sm text-gray-400">{{ $item->created_at }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            let player;

            // Función que inicializa el reproductor de YouTube
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('youtube-player', {
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            // Función que se ejecuta cuando el reproductor está listo
            function onPlayerReady(event) {
            }

            // Función que detecta cambios en el estado del reproductor
            function onPlayerStateChange(event) {
                if (event.data === YT.PlayerState.PLAYING) {
                    const interval = setInterval(() => {
                        const currentTime = player.getCurrentTime();
                        document.getElementById('current-time').innerText = currentTime.toFixed(2);

                        if (event.data !== YT.PlayerState.PLAYING) {
                            clearInterval(interval);
                        }
                    }, 1000);
                }
            }

            // Hook de Livewire para manejar cambios en el DOM
            Livewire.hook('message.processed', (el, component) => {
                if (document.getElementById('youtube-player')) {
                    onYouTubeIframeAPIReady();
                }
            });

            // Cargar la API de YouTube si no está ya disponible
            if (window.YT && YT.Player) {
                onYouTubeIframeAPIReady();
            } else {
                const tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                const firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            }
            console.log('Player is ready');

        });
    </script>


</div>
