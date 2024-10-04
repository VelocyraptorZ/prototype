<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend&family=DM+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex" x-data="{ open: false }">
            <div class="hidden md:block min-h-screen bg-white shadow w-full md:basis-2/4 lg:basis-1/6">  
                @livewire('navigation')
            </div>
            <div :class="{'block': open, 'hidden': ! open}" class="fixed md:hidden h-screen bg-white z-30 shadow w-full overflow-y-auto" >  
                @livewire('navigation')
            </div>
            <div class="grow min-h-screen bg-gray-100">
                <!-- Page Heading -->
                
                    <header class="bg-white shadow">
                        <div class="flex justify-between items-center">
                            <div class="flex p-4 font-lexend">
                                <x-tabler-menu-2 class="inline-block md:hidden cursor-pointer mr-4" @click="open = ! open" />
                                {{ $header }}
                            </div>
                            <div class="flex items-center">
                                <div class="">
                                    <a class="relative flex w-8" href="{{ route('notifications') }}">
                                        <x-tabler-bell/>
                                        @livewire('notification.count')
                                    </a>
                                </div>
                                <!-- Settings Dropdown -->
                                <div class="pr-4 relative">
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                        {{ Auth::user()->name }}
                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            @endif
                                        </x-slot>
                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>
                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>
                                            @can('View Role')
                                            <x-jet-dropdown-link href="{{ route('role.index') }}">
                                                {{ __('Roles') }}
                                            </x-jet-dropdown-link>
                                            @endcan
                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-jet-dropdown-link>
                                            @endif
                                            <div class="border-t border-gray-100"></div>
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                        @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            </div>
                        </div>
                    </header>
                
                @if(session('alert-success'))
                    <div class="text-gray-800 p-2 bg-green-200">{{ session('alert-success') }}</div>
                @endif
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @livewire('modal')
        @livewire('notification.push')
        <script>
            function openModal(component, params) {
                Livewire.emit('openModal', component, params);
            }
            function confirmDelete(formId, model='') {
                let text = "Are you sure to delete "+model+"?";
                if (confirm(text) == true) {
                    document.getElementById(formId).submit();
                }
            }
        </script>
    </body>
</html>
