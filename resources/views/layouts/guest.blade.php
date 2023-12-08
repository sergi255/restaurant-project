<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Taras u Borasa') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    </head>
    <body>
    <div class="bg-red-900 shadow-md" x-data="{ isOpen: false }">
      <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
          <a class="text-xl font-bold text-transparent bg-clip-text text-slate-50 hover:text-red-400 md:text-2xl hover:text-red-400"
            href="/">
            Taras u Borasa
          </a>
          <!-- Mobile menu button -->
          <div @click="isOpen = !isOpen" class="flex md:hidden">
            <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
              aria-label="toggle menu">
              <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                <path fill-rule="evenodd"
                  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                </path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div :class="isOpen ? 'flex' : 'hidden'"
          class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
          <a class="text-transparent bg-clip-text text-slate-50 hover:text-red-400"
            href="/">Strona główna</a>
          <a class="text-transparent bg-clip-text text-slate-50 hover:text-red-400"
          href="{{ route('kategorie.index') }}">Kategorie</a>
          <a class="text-transparent bg-clip-text text-slate-50 hover:text-red-400"
            href="{{ route('menus.index') }}">Menu</a>
          <a class="text-transparent bg-clip-text text-slate-50 hover:text-red-400"
            href="{{ route('rezerwacje.krok.pierwszy') }}">Zrób rezerwacje</a>
            <a class="text-transparent bg-clip-text text-slate-50 hover:text-red-400"
            href="{{ route('koszyki.index') }}">Zamówienie </a>
            
        </div>
      </nav>
    </div>
    <div class="font-sans text-gray-900 antialiased min-h-screen">
                {{ $slot }}
    </div>
    <footer class="bg-red-900 border-t border-gray-200 ">
      <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
        <div class="flex flex-wrap justify-center">
          <ul class="flex items-center space-x-4 text-white">
            <li><a href="/"> Strona główna </a> </li>
            <li><a href="{{ route('opinie.index') }}"> Opinie</a> </li>
          </ul>
        </div>
        <div class="flex justify-center mt-4 lg:mt-0">
        <ul class="flex items-center space-x-4 text-white">
           @if (Auth::user())
           <li> <a href="{{ route('dashboard') }}"> Dashboard</a></li>
           @else
            <li> <a href="{{ route('login') }}"> Zaloguj</a></li>
            <li> <a href="{{ route('register') }}"> Zarejestruj się</a></li>
            @endif
          </ul>
        </div>
      </div>
    </footer>
    </body>
</html>
