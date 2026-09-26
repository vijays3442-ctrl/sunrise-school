<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Overview') }}
    </x-slot>

    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-[#103741] to-[#1a5a6b] rounded-3xl p-8 mb-8 shadow-lg relative overflow-hidden">
        <!-- Decorative Circle -->
        <div class="absolute -right-10 -top-10 w-64 h-64 bg-white opacity-5 rounded-full blur-2xl"></div>
        <div class="absolute right-20 -bottom-20 w-48 h-48 bg-[#FE5D37] opacity-20 rounded-full blur-xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
            <div class="text-white mb-6 md:mb-0">
                <h2 class="text-3xl font-lobster font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-200 text-lg">Here's what's happening with your website today.</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.sliders.create') }}" class="bg-[#FE5D37] hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-medium transition-colors shadow-md flex items-center">
                    <i class="fa-solid fa-plus mr-2"></i> New Slider
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-md text-white px-5 py-2.5 rounded-xl font-medium transition-colors border border-white/20 flex items-center">
                    <i class="fa-solid fa-upload mr-2"></i> Upload Photos
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center group hover:shadow-md transition-shadow">
            <div class="w-16 h-16 rounded-2xl bg-[#FFF5F3] text-[#FE5D37] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-images"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Active Sliders</p>
                <h3 class="text-3xl font-bold text-[#103741]">{{ \App\Models\HeroSlider::count() }}</h3>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center group hover:shadow-md transition-shadow">
            <div class="w-16 h-16 rounded-2xl bg-[#F0F8FF] text-[#103741] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-camera-retro"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Gallery Photos</p>
                <h3 class="text-3xl font-bold text-[#103741]">{{ \App\Models\Gallery::count() ?? 0 }}</h3>
            </div>
        </div>
        
        <!-- Stat Card 3 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex items-center group hover:shadow-md transition-shadow">
            <div class="w-16 h-16 rounded-2xl bg-green-50 text-green-500 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-globe"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Website Status</p>
                <h3 class="text-xl font-bold text-[#103741] flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></span> Online
                </h3>
            </div>
        </div>

    </div>

    <!-- Quick Actions or Info -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-[#103741]">Getting Started</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start">
                    <div class="w-10 h-10 rounded-full bg-[#FFF5F3] text-[#FE5D37] flex items-center justify-center shrink-0 mt-1">
                        1
                    </div>
                    <div class="ml-4">
                        <h4 class="text-md font-bold text-gray-800">Customize Homepage Sliders</h4>
                        <p class="text-gray-500 text-sm mt-1">Go to the Hero Sliders section to upload high-quality images for your homepage. These images form the first impression of your school.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="w-10 h-10 rounded-full bg-[#FFF5F3] text-[#FE5D37] flex items-center justify-center shrink-0 mt-1">
                        2
                    </div>
                    <div class="ml-4">
                        <h4 class="text-md font-bold text-gray-800">Build Your Gallery</h4>
                        <p class="text-gray-500 text-sm mt-1">Upload event photos, facilities, and campus life pictures to the Photo Gallery to showcase your school's vibrant environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>