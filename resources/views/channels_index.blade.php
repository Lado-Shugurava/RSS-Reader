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
                    {{ __('Channels list') }}
                </h2>
            </div>
        </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Your channels:") }}
                        @if($channel->isEmpty())
                            <br>{{ "It's nothing channels. Select 'Add channel' option to add a feed" }}
                        @else
                            @foreach($channel as $item)
                                <div>
                                    {{ $item->title . ' - "' . $item->link .'"' }}
                                    <br>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="cleared"></div>
                    <div class="button_block_1">
                        <a href="/manage_channel/channels_create" class="button_green">Add channel</a>
                        <a href="/manage_channel/channels_index_for_edit" class="button_orange">Edit channel</a>
                        <a href="/manage_channel/channels_index_for_delete" class="button_red">Delete channel</a>
                    </div>
                    <div class="button_block_2">
                        <a href="{{ $_SERVER['HTTP_REFERER'] }}" class="button_blue">Back</a>
                    </div><br>
                </div>
            </div>
        </div>

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
                &copy lado-sergnnn Inc., 2022-{{ date('Y') }}
            </div>
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </main>
</div>
</body>
</html>

<style>
    .button_block_1 {
        height: auto;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
    }

    .button_block_2 {
        height: auto;
        padding: 20px;
        display: flex;
        justify-content: right;
    }

    .button_blue {
        display: inline-block;
        color: black;
        text-decoration: none;
        padding: .2em 2em;
        outline: none;
        border-width: 7px 0;
        border-style: solid none;
        border-color: #008CBA;
        border-radius: 6px;
        background: #008CBA;
        transition: 0.2s;
        box-shadow: 0 5px 15px 0 grey;
    }

    .button_green {
        display: inline-block;
        color: black;
        text-decoration: none;
        padding: .2em 2em;
        outline: none;
        border-width: 7px 0;
        border-style: solid none;
        border-color: #4CAF50;
        border-radius: 6px;
        margin-left:10px;
        background: #4CAF50;
        transition: 0.2s;
        box-shadow: 0 5px 15px 0 grey;
    }

    .button_orange {
        display: inline-block;
        color: black;
        text-decoration: none;
        padding: .2em 2em;
        outline: none;
        border-width: 7px 0;
        border-style: solid none;
        border-color: orange;
        border-radius: 6px;
        margin-left:10px;
        background: orange;
        transition: 0.2s;
        box-shadow: 0 5px 15px 0 grey;
    }

    .button_red {
        display: inline-block;
        color: black;
        text-decoration: none;
        padding: .2em 2em;
        outline: none;
        border-width: 7px 0;
        border-style: solid none;
        border-color: #f44336;;
        border-radius: 6px;
        margin-left:10px;
        background: #f44336;
        transition: 0.2s;
        box-shadow: 0 5px 15px 0 grey;
    }

    .button_blue:hover {background-color:#008CBA; color: white; box-shadow: 0 5px 15px 0 #008CBA;}
    .button_green:hover {background-color:#4CAF50; color: white; box-shadow: 0 5px 15px 0 #4CAF50;}
    .button_orange:hover {background-color:orange; color: white; box-shadow: 0 5px 15px 0 orange;}
    .button_red:hover {background-color:#f44336; color: white; box-shadow: 0 5px 15px 0 #f44336;}
</style>
