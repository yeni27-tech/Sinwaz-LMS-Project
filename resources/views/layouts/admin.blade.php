
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin | {{ !$title ? config('app.name') : $title }}</title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css"
        />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div class="flex">
            @include('sweetalert2::index');

            <!-- Sidebar -->
            <livewire:admin.sidebar />

            <main class="p-4 md:p-6 w-full overflow-y-scroll h-screen">
                {{ $slot }}
            </main>
        </div>


        @livewireScripts
        </body>
</html>
