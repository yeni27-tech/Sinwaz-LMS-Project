<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="/images/sinwaz-logo.png" type="image/x-icon">
        <title>Employee | {{ $title ?? config('app.name') }}</title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
            <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
            />
            <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
            />
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div class="flex">
            @include('sweetalert2::index')
            <!-- Sidebar -->
            <livewire:employee.components.sidebar />

            <main class="p-4 md:p-6 w-full overflow-y-scroll h-screen">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts

        <script>
            // Get the sidebar element and the button to close the sidebar
            const sidebar = document.getElementById("sidebar");
            const closeSidebarBtn = document.getElementById("closeSidebarBtn");

            // Function to close the sidebar
            closeSidebarBtn.addEventListener("click", () => {
                sidebar.classList.add("-translate-x-full");
                sidebar.classList.remove("translate-x-0");
            });

            // Function to open the sidebar if needed (you can add this functionality to another button to open the sidebar)
            function openSidebar() {
                sidebar.classList.remove("-translate-x-full");
                sidebar.classList.add("translate-x-0");
            }
        </script>

        {{-- <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
        </script> --}}
    </body>
</html>
