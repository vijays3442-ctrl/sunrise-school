@extends('layouts.public')

@section('title', 'School Gallery | Sunrise English Medium School')

@section('content')
<!-- Page Header -->
<section class="relative bg-white py-20 lg:py-28 overflow-hidden mt-0">
    <div class="absolute left-0 right-0 top-0 z-30 h-[10px] bg-center bg-repeat-x" style="background-image: url('{{ page_image('site.header_top') }}')"></div>
    <div class="absolute bottom-0 left-0 right-0 z-30 h-[19px] bg-center bg-repeat-x" style="background-image: url('{{ page_image('site.header_bottom') }}')"></div>
    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <span class="inline-block bg-orange-100 text-[#FE5D37] text-sm font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4">
            Campus Life & Memories
        </span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#103741] mb-5 font-lobster">
            Our <span class="text-[#FE5D37]">Gallery</span>
        </h1>
        <p class="text-lg md:text-xl text-[#74787C] max-w-2xl mx-auto font-light leading-relaxed">
            Explore glimpses of joy, creative learning, cultural celebrations, and sports activities at Sunrise English Medium School.
        </p>
    </div>
</section>

<!-- Gallery Main Section -->
<div 
    x-data="{
        typeFilter: 'all',
        categoryFilter: 'all',
        activeMedia: null,
        activeType: null,
        activeTitle: '',
        activeCategory: '',
        openPlayer(item) {
            this.activeMedia = item.mediaUrl;
            this.activeType = item.type;
            this.activeTitle = item.title;
            this.activeCategory = item.category;
            document.body.style.overflow = 'hidden';
        },
        closePlayer() {
            this.activeMedia = null;
            this.activeType = null;
            this.activeTitle = '';
            this.activeCategory = '';
            document.body.style.overflow = '';
        },
        matches(type, category) {
            const matchesType = (this.typeFilter === 'all') || (this.typeFilter === type);
            const matchesCategory = (this.categoryFilter === 'all') || (this.categoryFilter === category);
            return matchesType && matchesCategory;
        }
    }" 
    @keydown.escape.window="closePlayer()"
    class="container mx-auto px-4 lg:px-8 py-12">

    @if($galleries->count() > 0)
        <!-- Filter Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12">
            <!-- Type Tabs (All / Photos / Videos) -->
            <div class="flex items-center p-1.5 bg-white rounded-2xl shadow-sm border border-gray-100">
                <button 
                    type="button"
                    @click="typeFilter = 'all'"
                    :class="typeFilter === 'all' ? 'bg-[#FE5D37] text-white shadow-md' : 'text-[#103741] hover:text-[#FE5D37]'"
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-shapes"></i>
                    <span>All ({{ $galleries->count() }})</span>
                </button>
                <button 
                    type="button"
                    @click="typeFilter = 'photo'"
                    :class="typeFilter === 'photo' ? 'bg-[#FE5D37] text-white shadow-md' : 'text-[#103741] hover:text-[#FE5D37]'"
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-camera"></i>
                    <span>Photos ({{ $galleries->where('type', '!=', 'video')->count() }})</span>
                </button>
                <button 
                    type="button"
                    @click="typeFilter = 'video'"
                    :class="typeFilter === 'video' ? 'bg-[#FE5D37] text-white shadow-md' : 'text-[#103741] hover:text-[#FE5D37]'"
                    class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-circle-play"></i>
                    <span>Videos ({{ $galleries->where('type', 'video')->count() }})</span>
                </button>
            </div>

            <!-- Categories Chips -->
            @if($categories->count() > 0)
                <div class="flex flex-wrap items-center gap-2">
                    <button 
                        type="button"
                        @click="categoryFilter = 'all'"
                        :class="categoryFilter === 'all' ? 'bg-[#103741] text-white' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200'"
                        class="px-4 py-2 rounded-xl text-xs font-semibold transition-colors shadow-xs">
                        All Categories
                    </button>
                    @foreach($categories as $category)
                        <button 
                            type="button"
                            @click="categoryFilter = '{{ addslashes($category) }}'"
                            :class="categoryFilter === '{{ addslashes($category) }}' ? 'bg-[#103741] text-white' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200'"
                            class="px-4 py-2 rounded-xl text-xs font-semibold transition-colors shadow-xs">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galleries as $gallery)
                @php
                    $isVid = $gallery->is_video;
                    $mediaUrl = $isVid 
                        ? ($gallery->is_youtube ? $gallery->embed_url : $gallery->direct_video_url) 
                        : asset('storage/' . $gallery->image_path);
                    $itemCategory = $gallery->category ?? 'General';
                @endphp

                <div 
                    x-show="matches('{{ $isVid ? 'video' : 'photo' }}', '{{ addslashes($itemCategory) }}')"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group relative rounded-3xl overflow-hidden bg-white shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col cursor-pointer"
                    @click="openPlayer({
                        mediaUrl: '{{ addslashes($mediaUrl) }}',
                        type: '{{ $isVid ? ($gallery->is_youtube ? 'youtube' : 'mp4') : 'photo' }}',
                        title: '{{ addslashes($gallery->title) }}',
                        category: '{{ addslashes($itemCategory) }}'
                    })">

                    <!-- Thumbnail Container -->
                    <div class="relative aspect-4/3 w-full overflow-hidden bg-gray-900">
                        <img 
                            src="{{ $gallery->thumbnail_url }}" 
                            alt="{{ $gallery->title }}" 
                            loading="lazy"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-3.5 left-3.5 right-3.5 flex items-center justify-between z-10">
                            @if($isVid)
                                <span class="bg-[#FE5D37] text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-md flex items-center gap-1.5">
                                    <i class="fa-solid fa-play text-[10px]"></i> Video
                                </span>
                                @if($gallery->is_youtube)
                                    <span class="bg-black/60 backdrop-blur-md text-white text-[11px] font-medium px-2 py-0.5 rounded-lg flex items-center gap-1">
                                        <i class="fa-brands fa-youtube text-red-500 text-sm"></i> YouTube
                                    </span>
                                @else
                                    <span class="bg-black/60 backdrop-blur-md text-white text-[11px] font-medium px-2 py-0.5 rounded-lg">
                                        HD Video
                                    </span>
                                @endif
                            @else
                                <span class="bg-[#103741]/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md flex items-center gap-1.5">
                                    <i class="fa-solid fa-camera text-[10px] text-[#FE5D37]"></i> Photo
                                </span>
                            @endif
                        </div>

                        <!-- Play Button Overlay for Videos -->
                        @if($isVid)
                            <div class="absolute inset-0 flex items-center justify-center z-10">
                                <div class="relative flex items-center justify-center">
                                    <!-- Animated pulse ring -->
                                    <span class="animate-ping absolute inline-flex h-16 w-16 rounded-full bg-[#FE5D37] opacity-40"></span>
                                    <!-- Main button -->
                                    <div class="w-16 h-16 rounded-full bg-[#FE5D37] text-white flex items-center justify-center shadow-xl group-hover:scale-110 group-hover:bg-white group-hover:text-[#FE5D37] transition-all duration-300">
                                        <i class="fa-solid fa-play text-xl ml-1"></i>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="absolute inset-0 flex items-center justify-center z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-12 h-12 rounded-full bg-white/90 text-[#103741] flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-magnifying-glass-plus text-lg"></i>
                                </div>
                            </div>
                        @endif

                        <!-- Bottom Category Tag on image -->
                        <div class="absolute bottom-3 left-3.5 right-3.5 z-10">
                            <span class="text-orange-300 text-xs font-bold uppercase tracking-wider mb-1 block">
                                {{ $itemCategory }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 flex-1 flex flex-col justify-between bg-white">
                        <h3 class="text-[#103741] font-bold text-base leading-snug group-hover:text-[#FE5D37] transition-colors line-clamp-2">
                            {{ $gallery->title }}
                        </h3>

                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                            <span class="flex items-center text-[#FE5D37] font-semibold">
                                @if($isVid)
                                    <i class="fa-solid fa-circle-play mr-1.5"></i> Play Video
                                @else
                                    <i class="fa-solid fa-image mr-1.5"></i> View Photo
                                @endif
                            </span>
                            <span class="text-gray-400 group-hover:translate-x-1 transition-transform">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <!-- No Items Empty State -->
        <div class="text-center py-24 bg-white rounded-3xl border border-gray-100 shadow-sm max-w-2xl mx-auto px-6">
            <div class="w-20 h-20 bg-orange-50 text-[#FE5D37] rounded-full flex items-center justify-center mx-auto mb-5 shadow-inner">
                <i class="fa-solid fa-photo-film text-3xl"></i>
            </div>
            <h3 class="text-3xl font-bold text-[#103741] mb-3 font-lobster">Capturing Our Best Moments!</h3>
            <p class="text-gray-500 leading-relaxed text-base">
                We are updating our school gallery with memorable photographs and video highlights of our students and events. Check back soon!
            </p>
        </div>
    @endif

    <!-- In-Page Cinema Video & Photo Modal (Video Wahapehi Play Hoga) -->
    <div 
        x-show="activeMedia" 
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-black/90 backdrop-blur-md"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <!-- Modal Container -->
        <div 
            @click.away="closePlayer()"
            class="relative w-full max-w-5xl bg-[#103741] rounded-3xl overflow-hidden shadow-2xl border border-white/10 flex flex-col"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95">

            <!-- Top Header Bar -->
            <div class="px-6 py-4 bg-[#0a232a] border-b border-white/10 flex items-center justify-between text-white">
                <div class="pr-4">
                    <span class="text-xs font-bold text-[#FE5D37] uppercase tracking-wider block" x-text="activeCategory"></span>
                    <h3 class="text-lg md:text-xl font-bold text-white font-lobster truncate mt-0.5" x-text="activeTitle"></h3>
                </div>
                <button 
                    type="button"
                    @click="closePlayer()"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-[#FE5D37] text-white flex items-center justify-center transition-colors shadow-sm shrink-0"
                    title="Close (ESC)">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Media Viewport -->
            <div class="relative bg-black flex items-center justify-center min-h-[300px] sm:min-h-[460px]">
                
                <!-- YouTube Player -->
                <template x-if="activeType === 'youtube' && activeMedia">
                    <div class="w-full aspect-video">
                        <iframe 
                            :src="activeMedia" 
                            class="w-full h-full" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </template>

                <!-- HTML5 Video Player (MP4 / WebM direct file) -->
                <template x-if="activeType === 'mp4' && activeMedia">
                    <div class="w-full max-h-[75vh] flex items-center justify-center p-2">
                        <video 
                            :src="activeMedia" 
                            controls 
                            autoplay 
                            playsinline 
                            class="max-h-[72vh] w-full rounded-xl shadow-lg">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                </template>

                <!-- Photo Lightbox -->
                <template x-if="activeType === 'photo' && activeMedia">
                    <div class="p-3 max-h-[80vh] flex items-center justify-center">
                        <img 
                            :src="activeMedia" 
                            :alt="activeTitle" 
                            class="max-h-[75vh] max-w-full object-contain rounded-xl shadow-2xl">
                    </div>
                </template>

            </div>

            <!-- Footer info bar -->
            <div class="px-6 py-3 bg-[#0a232a] border-t border-white/10 flex items-center justify-between text-xs text-gray-400">
                <span class="flex items-center gap-1.5">
                    <i class="fa-solid fa-school text-[#FE5D37]"></i> Sunrise English Medium School
                </span>
                <span class="text-gray-400">
                    Press <kbd class="px-2 py-0.5 bg-white/10 rounded text-gray-300">ESC</kbd> or click outside to close
                </span>
            </div>

        </div>
    </div>
</div>
@endsection
