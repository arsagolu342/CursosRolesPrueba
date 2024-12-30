<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- toaster --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-center"
            };

            Livewire.on('success', event => {
                toastr.success('Proceso realizado correctamente.');
            });

            Livewire.on('error', event => {
                toastr.error(
                    'Ups... Ha ocurrido un problema en el proceso, intentalo de nuevo o comunicate con soporte.'
                );
            });

            Livewire.on('warning', event => {
                toastr.warning(
                    'Por favor verifique todos los campos o procesos designados en esta pantalla.');
            });
            Livewire.on('error_as2', event => {
                toastr.error(
                    'No pudimos conectarnos con el sistema ASINFO 2. Intentalo mas tarde o comunicate con soporte.'
                );
            });
            Livewire.on('error_user', event => {
                toastr.warning('El usuaurio ya existe.');
            });
            Livewire.on('message', event => {
                toastr.info(event);
            });

        });
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>
    @livewire('wire-elements-modal')

    @livewireScripts
</body>

</html>
