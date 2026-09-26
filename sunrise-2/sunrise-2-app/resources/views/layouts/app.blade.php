<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sunrise Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Heebo', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Inter', sans-serif; font-weight: 600; }
        .font-lobster { font-family: 'Poppins', sans-serif; font-weight: 600; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        @include('layouts.navigation')

        <!-- Main Content Wrapper -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            
            <!-- Top Header -->
            <header class="sticky top-0 z-30 flex items-center justify-between px-4 py-4 bg-white shadow-sm sm:px-6 lg:px-8 border-b border-gray-200">
                <div class="flex items-center">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    
                    <!-- Page Heading (Breadcrumb style) -->
                    @isset($header)
                        <div class="text-xl font-semibold text-[#103741]">
                            {{ $header }}
                        </div>
                    @endisset
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white rounded-full border border-gray-200 hover:text-[#FE5D37] hover:border-[#FE5D37] focus:outline-none transition ease-in-out duration-150 shadow-sm">
                                <div class="w-8 h-8 rounded-full bg-[#FFF5F3] text-[#FE5D37] flex items-center justify-center mr-2">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="fa-solid fa-gear w-5 text-gray-400 mr-1"></i> {{ __('Profile Settings') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-red-600 hover:text-red-700 hover:bg-red-50">
                                    <i class="fa-solid fa-right-from-bracket w-5 mr-1"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 w-full mx-auto">
                <div class="p-6">
                    {{ $slot }}
                </div>
            </main>
            
            <!-- Footer -->
            <footer class="mt-auto bg-white border-t border-gray-200 text-center py-4 text-sm text-gray-500">
                &copy; {{ date('Y') }} Sunrise English Medium School Admin Panel. Developed by Softfire Infotech.
            </footer>
        </div>
    </div>
</body>
</html>
