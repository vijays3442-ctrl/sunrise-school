<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sunrise English Medium School')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CSS (Local first, CDN fallback) -->
    <link rel="stylesheet" href="{{ asset('lib/swiper/swiper-bundle.min.css') }}" onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css';" />

    <!-- Scripts and Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-lobster { font-family: 'Poppins', sans-serif; font-weight: 600; }
        .font-heebo { font-family: 'Heebo', sans-serif; }
        body h1, body h3,
        body h1.font-lobster, body h3.font-lobster {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        .nav-link {
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #FE5D37;
        }
        
        .btn-kider {
            background-color: #FE5D37;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-kider:hover {
            background-color: #103741;
            color: white;
            transform: translateY(-2px);
        }
        [x-cloak] { display: none !important; }

        /* Responsive Desktop vs Mobile Navigation */
        @media (min-width: 1024px) {
            .navbar-desktop {
                display: flex !important;
            }
            .navbar-mobile-toggle,
            .navbar-mobile-drawer {
                display: none !important;
            }
            .top-bar-desktop {
                display: block !important;
            }
        }
        @media (max-width: 1023.98px) {
            .navbar-desktop {
                display: none !important;
            }
            .navbar-mobile-toggle {
                display: inline-flex !important;
            }
            .top-bar-desktop {
                display: none !important;
            }
        }
        .nav-desktop-item {
            font-size: 12.5px;
            font-weight: 700;
            padding-left: 7px;
            padding-right: 7px;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.2s ease;
        }
        @media (min-width: 1280px) {
            .nav-desktop-item {
                font-size: 13.5px;
                padding-left: 10px;
                padding-right: 10px;
            }
        }
        @media (min-width: 1536px) {
            .nav-desktop-item {
                font-size: 14px;
                padding-left: 12px;
                padding-right: 12px;
            }
        }
        .navbar-cta-btn {
            display: none;
        }
        @media (min-width: 1280px) {
            .navbar-cta-btn {
                display: inline-flex !important;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#FFF5F3] text-gray-800">

    @php
        $navigation = config('navigation');
    @endphp

    <!-- Top Bar -->
    <div class="hidden bg-[#103741] py-2 text-white lg:block">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between text-xs font-semibold 2xl:text-sm">
                <div class="flex items-center gap-5">
                    <span class="flex items-center"><i class="fa-solid fa-map-marker-alt mr-2 text-[#FE5D37]"></i> Nagorli Road, Tembhurni</span>
                    <span class="flex items-center"><i class="fa-solid fa-clock mr-2 text-[#FE5D37]"></i> Mon-Sat 9:00am - 4:00pm</span>
                </div>
                <div class="flex items-center gap-5">
                    @foreach($navigation['utility'] as $utilityLink)
                        <a href="{{ route($utilityLink['route'], $utilityLink['parameters'] ?? []) }}" class="transition hover:text-orange-200">{{ $utilityLink['label'] }}</a>
                    @endforeach

                    <a href="tel:+919767644720" class="flex items-center transition hover:text-orange-200"><i class="fa-solid fa-phone mr-2 text-[#FE5D37]"></i> +91 9767644720</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav x-data="{ mobileOpen: false, desktopOpen: null, mobileSection: null }" @keydown.escape.window="desktopOpen = null; mobileOpen = false" class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 lg:px-6">
            <div class="flex h-20 items-center justify-between gap-2 xl:gap-4">
                <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2">
                    <img src="{{ page_image('site.logo') }}" alt="{{ page_image_alt('site.logo') }}" class="h-12 w-auto 2xl:h-16">
                    <span class="font-lobster text-xl lg:text-2xl text-[#FE5D37] 2xl:text-3xl">Sunrise.</span>
                </a>

                <div class="navbar-desktop min-w-0 flex-1 items-stretch justify-center" @mouseleave="desktopOpen = null">
                    @foreach($navigation['primary'] as $index => $item)
                        @php
                            $itemUrl = route($item['route'], $item['parameters'] ?? []);
                            $isActive = request()->is(...explode('|', $item['match']));
                            $children = $item['children'] ?? [];
                            $hasGroups = collect($children)->contains(fn ($child) => isset($child['group']));
                            $columns = $item['columns'] ?? 1;
                        @endphp

                        <div class="relative flex items-stretch" @mouseenter="desktopOpen = {{ $index }}" @focusin="desktopOpen = {{ $index }}">
                            <a href="{{ $itemUrl }}" class="nav-desktop-item {{ $isActive ? 'text-[#FE5D37]' : 'text-[#103741] hover:text-[#FE5D37]' }}" @if($isActive) aria-current="page" @endif>
                                {{ $item['label'] }}
                                @if($children)<i class="fa-solid fa-chevron-down text-[9px] opacity-75"></i>@endif
                            </a>

                            @if($children)
                                @php
                                    $panelClass = match($columns) { 3 => 'w-[760px] max-w-[92vw]', 2 => 'w-[520px] max-w-[92vw]', default => 'w-72' };
                                    $gridClass = match($columns) { 3 => 'grid-cols-3', 2 => 'grid-cols-2', default => 'grid-cols-1' };
                                    $alignClass = match(true) {
                                        $index >= 6 => 'right-0',
                                        $index <= 1 => 'left-0',
                                        default => 'left-1/2 -translate-x-1/2',
                                    };
                                @endphp
                                <div x-cloak x-show="desktopOpen === {{ $index }}" x-transition.opacity.duration.150ms class="absolute {{ $alignClass }} top-full z-[60] {{ $panelClass }} pt-3">
                                    <div class="grid {{ $gridClass }} gap-3 rounded-3xl border border-gray-100 bg-white p-4 shadow-2xl">
                                        @if($hasGroups)
                                            @foreach(collect($children)->groupBy(fn ($child) => $child['group'] ?? 'Explore') as $group => $groupChildren)
                                                <div class="rounded-2xl bg-gray-50 p-3">
                                                    <p class="mb-2 px-2 text-xs font-bold uppercase tracking-wider text-[#FE5D37]">{{ $group }}</p>
                                                    @foreach($groupChildren as $child)
                                                        <a href="{{ route($child['route'], $child['parameters'] ?? []) }}" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-[#103741] transition hover:bg-white hover:text-[#FE5D37] hover:shadow-sm">{{ $child['label'] }}</a>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($children as $child)
                                                <a href="{{ route($child['route'], $child['parameters'] ?? []) }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-[#103741] transition hover:bg-orange-50 hover:text-[#FE5D37]">{{ $child['label'] }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="flex shrink-0 items-center gap-3">
                    <a href="{{ route($navigation['cta']['route'], $navigation['cta']['parameters']) }}" class="navbar-cta-btn items-center gap-2 rounded-full bg-[#FE5D37] px-4 py-2 text-xs font-bold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-[#103741] 2xl:px-5 2xl:py-3 2xl:text-sm">
                        Admission Enquiry <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <button type="button" @click="mobileOpen = !mobileOpen" class="navbar-mobile-toggle h-11 w-11 items-center justify-center rounded-xl text-[#103741] transition hover:bg-orange-50 hover:text-[#FE5D37]" :aria-expanded="mobileOpen.toString()" aria-controls="mobile-navigation">
                        <span class="sr-only">Toggle main menu</span>
                        <i class="fa-solid" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-navigation" x-cloak x-show="mobileOpen" x-transition class="navbar-mobile-drawer max-h-[calc(100vh-5rem)] overflow-y-auto border-t border-gray-100 bg-white">
            <div class="container mx-auto space-y-1 px-4 py-4">
                @foreach($navigation['primary'] as $index => $item)
                    @php
                        $itemUrl = route($item['route'], $item['parameters'] ?? []);
                        $children = $item['children'] ?? [];
                    @endphp
                    <div class="rounded-2xl border border-gray-100">
                        <div class="flex items-center">
                            <a href="{{ $itemUrl }}" class="min-w-0 flex-1 rounded-l-2xl px-4 py-3.5 font-bold text-[#103741] hover:bg-orange-50 hover:text-[#FE5D37]">{{ $item['label'] }}</a>
                            @if($children)
                                <button type="button" @click="mobileSection = mobileSection === {{ $index }} ? null : {{ $index }}" class="flex h-12 w-12 items-center justify-center border-l border-gray-100 text-[#103741]" :aria-expanded="(mobileSection === {{ $index }}).toString()">
                                    <i class="fa-solid fa-chevron-down text-xs transition-transform" :class="mobileSection === {{ $index }} && 'rotate-180'"></i>
                                    <span class="sr-only">Toggle {{ $item['label'] }} submenu</span>
                                </button>
                            @endif
                        </div>
                        @if($children)
                            <div x-cloak x-show="mobileSection === {{ $index }}" x-transition class="border-t border-gray-100 bg-gray-50 px-3 py-2">
                                @foreach($children as $child)
                                    @if(isset($child['group']) && ($loop->first || $child['group'] !== ($children[$loop->index - 1]['group'] ?? null)))
                                        <p class="px-3 pb-1 pt-3 text-xs font-bold uppercase tracking-wider text-[#FE5D37]">{{ $child['group'] }}</p>
                                    @endif
                                    <a href="{{ route($child['route'], $child['parameters'] ?? []) }}" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-gray-700 hover:bg-white hover:text-[#FE5D37]">{{ $child['label'] }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="grid grid-cols-2 gap-3 pt-3">
                    <a href="{{ route('contact') }}" class="rounded-full border-2 border-[#103741] px-4 py-3 text-center text-sm font-bold text-[#103741]">Contact Us</a>
                    <a href="{{ route($navigation['cta']['route'], $navigation['cta']['parameters']) }}" class="rounded-full bg-[#FE5D37] px-4 py-3 text-center text-sm font-bold text-white">Admission Enquiry</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#103741] text-gray-300 py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- School Info -->
                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-3 mb-6">
                        <img src="{{ page_image('site.logo') }}" alt="{{ page_image_alt('site.logo') }}" class="h-12 w-auto bg-white p-1 rounded-lg">
                        <span class="font-lobster text-3xl text-white">Sunrise<span class="text-[#FE5D37]">.</span></span>
                    </a>
                    <p class="text-sm leading-relaxed mb-6">Providing a nurturing and innovative environment where every child can flourish academically and personally.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#FE5D37] hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#FE5D37] hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#FE5D37] hover:text-white transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white text-xl font-bold mb-6 font-lobster">Quick Links</h3>
                    <ul class="space-y-3 text-sm">
                        @foreach(array_slice($navigation['primary'], 1) as $item)
                            <li><a href="{{ route($item['route'], $item['parameters'] ?? []) }}" class="hover:text-[#FE5D37] transition-colors"><i class="fa-solid fa-angle-right mr-2"></i>{{ $item['label'] }}</a></li>
                        @endforeach
                        <li><a href="{{ route('contact') }}" class="hover:text-[#FE5D37] transition-colors"><i class="fa-solid fa-angle-right mr-2"></i>Contact Us</a></li>
                        <li><a href="{{ route($navigation['disclosure']['route']) }}" class="hover:text-[#FE5D37] transition-colors"><i class="fa-solid fa-angle-right mr-2"></i>Mandatory Disclosure</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-white text-xl font-bold mb-6 font-lobster">Contact Us</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot mt-1 text-[#FE5D37]"></i>
                            <span>NAGORLI ROAD, TEMBHURNI, SOLAPUR - 413211</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-[#FE5D37]"></i>
                            <span>+91 9767644720, 9657100909</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-[#FE5D37]"></i>
                            <span>Hmsunrisegurukul@gmail.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-white text-xl font-bold mb-6 font-lobster">Newsletter</h3>
                    <p class="text-sm mb-4">Subscribe to our newsletter to get the latest updates and news.</p>
                    <div class="relative w-full max-w-sm">
                        <input type="text" class="w-full bg-white/10 border-0 rounded-full py-3 px-4 text-white placeholder-gray-400 focus:ring-2 focus:ring-[#FE5D37]" placeholder="Your email">
                        <button class="absolute right-1 top-1 bottom-1 bg-[#FE5D37] text-white rounded-full px-6 font-medium hover:bg-white hover:text-[#FE5D37] transition-colors">Sign Up</button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-sm">
                <p>&copy; {{ now()->year }} Sunrise English Medium School. All Rights Reserved.</p>
                <div class="mt-4 md:mt-0 space-x-4">
                    <a href="#" class="hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-white">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Swiper JS (Local first, CDN fallback) -->
    <script src="{{ asset('lib/swiper/swiper-bundle.min.js') }}"></script>
    <script>
        if (typeof Swiper === 'undefined') {
            document.write('<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"><\/script>');
        }
    </script>
    
    @stack('scripts')
</body>
</html>
