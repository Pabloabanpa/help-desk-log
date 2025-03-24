<!-- NAVBAR GENERAL -->
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <!-- LOGO -->
        <a class="flex flex-col items-start leading-tight no-underline">
            <span class="text-3xl font-extrabold text-gray-800 dark:text-white">Help Desk</span>
            <span class="text-base font-medium text-gray-600 dark:text-gray-300">Sistema de soporte</span>
        </a>

        <!-- PERFIL DE USUARIO + BOTÓN DE MENÚ -->
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse" x-data="{ open: false }">
            <!-- BOTÓN DE AVATAR -->

            <button @click="open = !open" type="button"

                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="user photo">
            </button>

            <!-- DROPDOWN DE USUARIO -->
            <div x-show="open" @click.outside="open = false"
                class="z-50 mt-2 absolute right-4 w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown" x-cloak>

                <!-- INFO DEL USUARIO -->
                <div class="px-4 py-3">
                    @auth
                    <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    @endauth
                </div>

                <!-- ENLACES DEL DROPDOWN -->
                <div class="py-2 space-y-1">
                    <a href="{{ route('dashboard') }}"
                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Dashboard
                    </a>

                    <a href="{{ route('profile.show') }}"
                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Perfil
                    </a>

                    <!-- BOTÓN DE CIERRE DE SESIÓN -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>

            <!-- BOTÓN DE MENÚ PARA MÓVILES -->
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- MENÚ PRINCIPAL -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li><a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white">Usuarios</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white">Solicitudes</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white">Atenciones</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white">Anotaciones</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white">Roles</a></li>
            </ul>
        </div>
    </div>
</nav>
