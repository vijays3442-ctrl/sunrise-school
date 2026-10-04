@extends('layouts.public')

@section('title', 'About Us - Sunrise English Medium School')

@section('content')

<!-- Page Header -->
<div class="relative bg-[#103741] py-20 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image: url('{{ page_image('about.header') }}'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-white text-5xl md:text-6xl font-lobster font-bold mb-4">About Us</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">Discover the history, mission, and vision of Sunrise English School.</p>
    </div>
</div>

<!-- Content Section -->
<div class="py-16 bg-[#FFF5F3]">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-sm border border-gray-100 max-w-5xl mx-auto">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="text-3xl font-lobster text-[#103741] mb-6">Our History</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Sunrise English Medium School was established with a clear vision to provide world-class education rooted in strong moral values. For years, we have been a beacon of knowledge and personal development in our community.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Our CBSE affiliation ensures that our curriculum meets national standards while providing students with the flexibility and critical thinking skills required for the modern world.
                    </p>
                </div>
                <div class="rounded-blob overflow-hidden shadow-lg border-[15px] border-[#FFF5F3] animate-[float_4s_ease-in-out_infinite]">
                    <img src="{{ page_image('about.history') }}" alt="{{ page_image_alt('about.history') }}" class="w-full h-auto">
                </div>
            </div>

            <hr class="border-gray-200 mb-16">

            <!-- Leadership & Management Messages Section -->
            <div>
                <div class="text-center mb-12">
                    <span class="text-[#FE5D37] font-semibold text-sm tracking-wider uppercase bg-orange-100 px-4 py-1.5 rounded-full inline-block mb-3">Our Guiding Pillars</span>
                    <h2 class="text-3xl md:text-4xl font-lobster text-[#103741] mb-4">Messages from Our Leadership</h2>
                    <div class="w-24 h-1 bg-[#FE5D37] mx-auto rounded-full mb-3"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">Guiding vision and inspiring messages from the Chairman, Secretary, and Directors of Sunrise English Medium School.</p>
                </div>

                <div class="space-y-10">
                    @forelse($leaders ?? [] as $leader)
                    <div class="bg-gradient-to-br from-white to-[#FFF9F7] rounded-3xl p-6 md:p-8 shadow-sm border border-orange-100 hover:shadow-md transition-shadow relative overflow-hidden break-inside-avoid" style="page-break-inside: avoid;">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-orange-100/40 rounded-full blur-2xl pointer-events-none"></div>
                        
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-8 relative z-10">
                            <!-- Leader Photo & Info Column -->
                            <div class="flex flex-col items-center text-center md:w-1/3 shrink-0">
                                <div class="relative group mb-4">
                                    <div class="w-36 h-36 md:w-44 md:h-44 rounded-2xl overflow-hidden shadow-lg border-4 border-white ring-4 ring-orange-200/60 bg-gray-100 mx-auto" style="width: 160px; height: 160px;">
                                        @php
                                            $isChairman = in_array(strtolower($leader->role ?? ''), ['chairman', 'founder']);
                                            $photoSrc = $isChairman 
                                                ? page_image('home.founder') 
                                                : ($leader->photo_path ? (Str::startsWith($leader->photo_path, 'http') ? $leader->photo_path : asset(ltrim($leader->photo_path, '/'))) : null);
                                            $photoAlt = $isChairman 
                                                ? page_image_alt('home.founder') 
                                                : $leader->name;
                                        @endphp
                                        @if($photoSrc)
                                            <img src="{{ $photoSrc }}" 
                                                 alt="{{ $photoAlt }}" 
                                                 style="width: 160px; height: 160px; object-fit: cover; object-position: center 10%; display: block;"
                                                 class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gray-50 text-gray-400" style="width: 160px; height: 160px;">
                                                <i class="fa-solid fa-user-tie text-5xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <span class="inline-block mt-3 bg-[#103741] text-white text-xs font-semibold px-4 py-1.5 rounded-full shadow-md">
                                        {{ $leader->designation }}
                                    </span>
                                </div>

                                <h3 class="text-xl md:text-2xl font-bold text-[#103741] mt-2">{{ $leader->name }}</h3>
                                
                                @if($leader->qualification)
                                    <p class="text-xs font-medium text-gray-500 mt-1">{{ $leader->qualification }}</p>
                                @endif

                                @if($leader->email || $leader->phone)
                                    <div class="flex items-center space-x-3 mt-3 text-xs text-gray-500">
                                        @if($leader->email)
                                            <a href="mailto:{{ $leader->email }}" class="hover:text-[#FE5D37] transition" title="{{ $leader->email }}">
                                                <i class="fa-solid fa-envelope"></i>
                                            </a>
                                        @endif
                                        @if($leader->phone)
                                            <a href="tel:{{ $leader->phone }}" class="hover:text-[#FE5D37] transition" title="{{ $leader->phone }}">
                                                <i class="fa-solid fa-phone"></i>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Leader Message Column -->
                            <div class="flex-1 flex flex-col justify-center w-full">
                                <div class="relative bg-white/90 rounded-2xl p-6 md:p-8 border border-gray-100 shadow-inner">
                                    <div class="text-[#FE5D37] opacity-30 text-3xl mb-2">
                                        <i class="fa-solid fa-quote-left"></i>
                                    </div>
                                    <div class="text-gray-700 leading-relaxed text-base md:text-lg italic space-y-3">
                                        {!! nl2br(e($leader->message)) !!}
                                    </div>
                                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                                        <div class="text-xs text-gray-400 font-medium">
                                            Sunrise English Medium School Leadership Desk
                                        </div>
                                        <div class="text-sm font-bold text-[#FE5D37]">
                                            — {{ $leader->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-10 text-gray-500">
                        <i class="fa-solid fa-users text-4xl mb-3 text-gray-300 block"></i>
                        <p>Leadership messages will be updated shortly.</p>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
