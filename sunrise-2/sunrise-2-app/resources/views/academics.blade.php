@extends('layouts.public')

@section('title', 'Academics - Sunrise English Medium School')

@section('content')

<!-- Page Header -->
<div class="relative bg-[#103741] py-20 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image: url('{{ page_image('academics.header') }}'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-white text-5xl md:text-6xl font-lobster font-bold mb-4">Academics</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">Explore our CBSE curriculum designed for comprehensive student growth.</p>
    </div>
</div>

<!-- Content Section -->
<div class="py-16 bg-[#FFF5F3]">
    <div class="container mx-auto px-4 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-lobster text-[#103741] mb-4">CBSE Curriculum</h2>
            <div class="w-24 h-1 bg-[#FE5D37] mx-auto rounded mb-8"></div>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                As a proudly affiliated CBSE institution, Sunrise English School follows a structured yet flexible academic framework that promotes holistic education, innovative learning, and practical problem-solving skills.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Primary Box -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <div class="w-20 h-20 bg-[#FFF5F3] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-[#FE5D37] transition">
                    <i class="fa-solid fa-shapes text-3xl text-[#FE5D37] group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-[#103741] mb-3">Pre-Primary</h3>
                <p class="text-gray-600 mb-4 text-sm leading-relaxed">Focus on play-way methods, fundamental literacy, numeracy, and motor skills development.</p>
            </div>
            
            <!-- Middle Box -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <div class="w-20 h-20 bg-[#FFF5F3] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-[#FE5D37] transition">
                    <i class="fa-solid fa-book-open text-3xl text-[#FE5D37] group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-[#103741] mb-3">Primary & Middle</h3>
                <p class="text-gray-600 mb-4 text-sm leading-relaxed">Activity-based learning covering languages, mathematics, environmental studies, and computer science.</p>
            </div>

            <!-- Secondary Box -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <div class="w-20 h-20 bg-[#FFF5F3] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-[#FE5D37] transition">
                    <i class="fa-solid fa-microscope text-3xl text-[#FE5D37] group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-[#103741] mb-3">Secondary</h3>
                <p class="text-gray-600 mb-4 text-sm leading-relaxed">Rigorous CBSE board preparation with advanced science labs, critical thinking, and career counseling.</p>
            </div>
        </div>

    </div>
</div>

@endsection
