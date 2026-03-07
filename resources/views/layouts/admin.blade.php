<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin | {{ !$title ? config('app.name') : $title }}</title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <link rel="shortcut icon" href="/images/sinwaz-logo.png" type="image/x-icon">
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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @livewireStyles
    </head>
    <body>
        <div class="flex">
            @include('sweetalert2::index')

            <!-- Sidebar -->
            <livewire:admin.sidebar />

            <main class="p-4 md:p-6 w-full overflow-y-scroll h-screen">
                {{ $slot }}
            </main>
        </div>


    <script>
        const currentPathname = window.location.pathname;

        const handleOnDelete = (id) => {
            const form = document.getElementById(id)

                  Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                       form.submit()
                    }
                });
        }

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

        @livewireScripts
        </body>
</html>
