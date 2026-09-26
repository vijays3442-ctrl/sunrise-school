@extends('layouts.public')

@section('title', 'School Gallery')

@section('content')
<!-- Elegant Page Header -->
<section class="relative bg-white py-24 lg:py-32 overflow-hidden mt-0">
    <div class="absolute left-0 right-0 top-0 z-30 h-[10px] bg-center bg-repeat-x" style="background-image: url('{{ page_image('site.header_top') }}')"></div>
    <div class="absolute bottom-0 left-0 right-0 z-30 h-[19px] bg-center bg-repeat-x" style="background-image: url('{{ page_image('site.header_bottom') }}')"></div>
    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-[#103741] mb-6 font-lobster">
            Our <span class="text-[#FE5D37]">Gallery</span>
        </h1>
        <p class="text-xl text-[#74787C] max-w-2xl mx-auto font-light leading-relaxed">
            Moments of joy, learning, and celebration at Sunrise English School.
        </p>
    </div>
</section>

<!-- Gallery Content -->
<div class="container mx-auto px-4 lg:px-8 py-16">
    @if($galleries->count() > 0)
        <!-- Masonry Grid -->
        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
            @foreach($galleries as $gallery)
                <div class="break-inside-avoid group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-auto transform group-hover:scale-105 transition-transform duration-500 rounded-2xl">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#103741]/90 via-[#103741]/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 rounded-2xl">
                        <span class="text-[#FE5D37] text-sm font-semibold mb-1 uppercase tracking-wider">{{ $gallery->category ?? 'Event' }}</span>
                        <h3 class="text-white text-xl font-bold font-lobster leading-tight">{{ $gallery->title }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
            <i class="fa fa-image text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-2xl font-bold text-[#103741] mb-2 font-lobster">More Memories Coming Soon!</h3>
            <p class="text-gray-500">We are currently gathering our best moments to share with you.</p>
        </div>
    @endif
</div>
@endsection
