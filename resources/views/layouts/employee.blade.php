
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Employee | {{ $title ?? config('app.name') }}</title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css"
        />
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div class="flex">
            @include('sweetalert2::index');
            <!-- Sidebar -->
            <livewire:employee.components.sidebar />

            <main class="p-4 md:p-6 w-full overflow-y-scroll h-screen">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts

        {{-- <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
        </script> --}}
    </body>
</html>
