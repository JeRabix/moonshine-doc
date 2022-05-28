<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('APP_NAME'))</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body x-data="{mobileMenuDisplayed: false}" class="antialiased leading-none font-sans text-gray-800">

<header class="bg-gradient-to-r from-purple to-pink text-white py-8 px-6 md:px-12 xl:px-0">
    <div class="container">
        <div class="flex items-center justify-between">
            @include('shared.logo')

            <a href="https://github.com/lee-to/moonshine">
                <svg class="fill-current w-6 h-6" viewBox="0 0 20 20"><path d="M10 0a10 10 0 0 0-3.16 19.49c.5.1.68-.22.68-.48l-.01-1.7c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.9 1.52 2.34 1.08 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.64s.84-.27 2.75 1.02a9.58 9.58 0 0 1 5 0c1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.4.1 2.64.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85l-.01 2.75c0 .26.18.58.69.48A10 10 0 0 0 10 0"></path></svg>
            </a>

            <div class="md:hidden relative z-10">
                <button @click="mobileMenuDisplayed = true" class="block focus:outline-none" type="button">
                    <svg class="block fill-current text-white w-6 h-6" viewBox="0 0 20 20">
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="container max-w-6xl md:px-12 xl:px-0 py-12 md:py-24 flex">
    <div x-show="mobileMenuDisplayed" class="fixed inset-0 flex z-40 lg:hidden">
        <div :class="!mobileMenuDisplayed ? 'opacity-0' : 'opacity-100'"
             @click="mobileMenuDisplayed = false"
             class="fixed inset-0 bg-black bg-opacity-25 transition-opacity ease-linear duration-300 opacity-100" aria-hidden="true"></div>

        <div :class="!mobileMenuDisplayed ? 'translate-x-full' : 'translate-x-0'" class="transition ease-in-out duration-300 transform ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 px-4 pb-12 flex flex-col overflow-y-auto translate-x-0">
            @include('shared.menu')
        </div>
    </div>


    <aside class="hidden md:block md:w-48 lg:w-56 flex-shrink-0 border-r">
        @include('shared.menu')
    </aside>

    <div class="flex-1 overflow-hidden px-6 md:pl-12 md:pr-0 lg:pl-16 xl:pl-16 xl:pr-20 leading-relaxed text-lg">
        @include('shared.flash')

        @yield('content')
    </div>


    <aside class="hidden xl:block w-44 flex-shrink-0 relative -mt-8">
        @yield('right-sidebar')
    </aside>
</div>

<footer></footer>
</body>
</html>
