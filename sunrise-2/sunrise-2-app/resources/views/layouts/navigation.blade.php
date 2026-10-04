<!-- Sidebar -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-40 w-64 transition-transform duration-300 ease-in-out bg-[#103741] text-white lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
    
    <!-- Sidebar Header (Logo) -->
    <div class="flex items-center justify-center h-20 border-b border-white/10 px-6">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 w-full">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-graduation-cap text-[#FE5D37] text-xl"></i>
            </div>
            <h1 class="text-white font-lobster text-2xl m-0 tracking-wide">Sunrise<span class="text-[#FE5D37]">.</span></h1>
        </a>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto custom-scrollbar">
        
        <p class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-4">Main Menu</p>
        
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-chart-pie w-6 text-center mr-2 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            {{ __('Dashboard') }}
        </a>

        <p class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-8">Content Management</p>

        <a href="{{ route('admin.sliders.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.sliders.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-images w-6 text-center mr-2 {{ request()->routeIs('admin.sliders.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            {{ __('Hero Sliders') }}
        </a>

        <a href="{{ route('admin.gallery.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.gallery.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-camera-retro w-6 text-center mr-2 {{ request()->routeIs('admin.gallery.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            {{ __('Photo Gallery') }}
        </a>

        <a href="{{ route('admin.page-images.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.page-images.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-image-portrait w-6 text-center mr-2 {{ request()->routeIs('admin.page-images.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            {{ __('Page Images') }}
        </a>

        <a href="{{ route('admin.notices.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.notices.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-newspaper w-6 text-center mr-2 {{ request()->routeIs('admin.notices.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            {{ __('News & Notices') }}
        </a>

        <a href="{{ route('admin.leadership.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.leadership.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-users-gear w-6 text-center mr-2 {{ request()->routeIs('admin.leadership.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            {{ __('Leadership Messages') }}
        </a>

        <p class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-8">Inquiries & Leads</p>

        @php
            $pendingAppts = \App\Models\Appointment::where('status', 'pending')->count();
            $unreadMessages = \App\Models\ContactMessage::where('status', 'unread')->count();
        @endphp

        <a href="{{ route('admin.appointments.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.appointments.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-calendar-check w-6 text-center mr-2 {{ request()->routeIs('admin.appointments.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            <span>{{ __('Appointments') }}</span>
            @if($pendingAppts > 0)
                <span class="ml-auto px-2 py-0.5 text-[11px] font-bold rounded-full bg-amber-400 text-slate-900">{{ $pendingAppts }}</span>
            @endif
        </a>

        <a href="{{ route('admin.contact.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.contact.*') ? 'bg-[#FE5D37] text-white shadow-lg shadow-[#FE5D37]/30' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
            <i class="fa-solid fa-envelope-open-text w-6 text-center mr-2 {{ request()->routeIs('admin.contact.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
            <span>{{ __('Messages') }}</span>
            @if($unreadMessages > 0)
                <span class="ml-auto px-2 py-0.5 text-[11px] font-bold rounded-full bg-orange-500 text-white">{{ $unreadMessages }}</span>
            @endif
        </a>

        <p class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-8">Quick Links</p>
        
        <a href="/" target="_blank" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-200">
            <i class="fa-solid fa-globe w-6 text-center mr-2 text-gray-400"></i>
            {{ __('View Website') }}
            <i class="fa-solid fa-arrow-up-right-from-square ml-auto text-xs opacity-50"></i>
        </a>

    </nav>
    
    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-white/10 bg-[#0c2931]">
        <div class="flex items-center p-3 bg-white/5 rounded-xl border border-white/10">
            <div class="w-8 h-8 rounded-full bg-[#FE5D37] flex items-center justify-center text-white font-bold text-xs shrink-0">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="ml-3 overflow-hidden">
                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-400 truncate">Administrator</p>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile Overlay -->
<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black bg-opacity-50 lg:hidden transition-opacity" x-transition.opacity></div>

<style>
    /* Custom Scrollbar for Sidebar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
    }
    .custom-scrollbar:hover::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.4);
    }
</style>
