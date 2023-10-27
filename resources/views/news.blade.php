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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $channelName }}
                </h2>
            </div>
        </header>

    <!-- Page Content -->
    <main>
        <div class="mt-3"></div>
        @foreach($items -> channel -> item as $item)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <article>
                        <div class=topic>
                            <h1>
                                <b>{{ $item->title }}</b>
                            </h1>
                        </div>
                        <p>
                            <br>{{ strip_tags($item -> description) }}
                        </p><br>
                        <aside>
                           <!--  <a href="{{ $item->link }}">Read original page</a> -->
                            <a href="{{ $item->link }}" class="button">Read original</a>
                        </aside>
                    </article>
                </div>
            </div>
        </div>
            <div class="mt-3"></div>
        @endforeach

        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                (PHP v{{ PHP_VERSION }})
            </div>
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                &copy 2022-{{ date('Y') }}
            </div>
        </div>

    </main>
</div>
</body>
</html>

<style>
    .topic
    {margin:0 auto;text-align:center;position:relative}

    a.button {
        display: inline-block;
        color: black;
        text-decoration: none;
        padding: .2em 2em;
        outline: none;
        border-width: 2px 0;
        border-style: solid none;
        border-color: #FDBE33 #000 #D77206;
        border-radius: 6px;
        background: linear-gradient(#F3AE0F, #E38916) #E38916;
        transition: 0.2s;
        box-shadow: 0 5px 15px 0 grey;
    }
    a.button:hover { background: linear-gradient(#f5ae00, #f59500) #f5ae00; }
    a.button:active { background: linear-gradient(#f59500, #f5ae00) #f59500; }
</style>
