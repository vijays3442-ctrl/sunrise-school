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

            <div class="text-center mb-12">
                <h2 class="text-3xl font-lobster text-[#103741] mb-4">Principal's Message</h2>
                <div class="w-24 h-1 bg-[#FE5D37] mx-auto rounded"></div>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-8 italic text-gray-700 text-lg leading-relaxed text-center relative max-w-4xl mx-auto border-l-4 border-[#FE5D37]">
                <i class="fa-solid fa-quote-left text-4xl text-gray-200 absolute top-4 left-4"></i>
                <p class="relative z-10 px-8 py-4">
                    "Education is not just about academic excellence; it is about character building and preparing our children for the challenges of tomorrow. At Sunrise, we nurture every child's unique potential."
                </p>
                <div class="mt-4 font-bold not-italic text-[#103741]">- Principal Shahida Aslam Pathan</div>
            </div>

        </div>
    </div>
</div>

@endsection
