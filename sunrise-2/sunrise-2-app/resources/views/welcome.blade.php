@extends('layouts.public')

@section('content')

<!-- 1. Premium Hero Section -->
<section class="hero-slider-section relative w-full overflow-hidden bg-[#103741]">
    <!-- Kider Cloud Border Top -->
    <div class="absolute top-0 left-0 right-0 z-30 w-full h-[15px] md:h-[20px] lg:h-[25px] pointer-events-none" style="background: url('{{ page_image('site.header_top') }}') top center repeat-x; background-size: contain;"></div>

    <!-- Main Slider -->
    <div class="swiper heroSwiper" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%;">
        <div class="swiper-wrapper" style="width: 100%; height: 100%;">
            @if(isset($sliders) && $sliders->count() > 0)
                @foreach($sliders as $slider)
                <div class="swiper-slide" style="position: relative; width: 100%; height: 100%; min-height: 520px; overflow: hidden; background-color: #103741;">
                    <!-- Layered Image Background with Responsive Fit & Ambient Fill -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden;">
                        <!-- Ambient backdrop blur for perfect aspect ratio matching -->
                        <img src="{{ Str::startsWith($slider->image_path, 'http') ? $slider->image_path : asset(ltrim($slider->image_path, '/')) }}" 
                             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; filter: blur(20px); transform: scale(1.1); opacity: 0.35; pointer-events: none;" 
                             aria-hidden="true" 
                             alt="">

                        <!-- Main Crisp Sharp Image -->
                        <img src="{{ Str::startsWith($slider->image_path, 'http') ? $slider->image_path : asset(ltrim($slider->image_path, '/')) }}" 
                             class="hero-slide-img" 
                             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center center; image-orientation: from-image;" 
                             alt="{{ $slider->title ?: 'Sunrise English Medium School' }}">
                    </div>
                    
                    <!-- Balanced Multi-Stop Gradient Overlays -->
                    <!-- Desktop Overlay: Left-to-right fade so image subject is vibrant and visible on right -->
                    <div class="hidden md:block hero-overlay-desktop" 
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; background: linear-gradient(90deg, rgba(16, 55, 65, 0.88) 0%, rgba(16, 55, 65, 0.65) 35%, rgba(16, 55, 65, 0.18) 65%, transparent 100%);"></div>

                    <!-- Mobile Overlay: Smooth bottom fade so image subject is clear at top/center and text is legible below -->
                    <div class="block md:hidden hero-overlay-mobile" 
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; background: linear-gradient(180deg, rgba(16, 55, 65, 0.3) 0%, rgba(16, 55, 65, 0.6) 45%, rgba(16, 55, 65, 0.92) 100%);"></div>

                    <!-- Gentle Top/Bottom Vignette for Header/Footer contrast -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; background: linear-gradient(180deg, rgba(16, 55, 65, 0.4) 0%, transparent 18%, transparent 82%, rgba(16, 55, 65, 0.5) 100%);"></div>

                    <!-- Slide Content -->
                    <div class="hero-slide-content relative h-full flex items-center z-10 py-10 sm:py-14 md:py-16" style="position: relative; z-index: 10; width: 100%; min-height: 520px;">
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="w-full sm:w-11/12 md:w-9/12 lg:w-7/12 xl:w-7/12" data-swiper-parallax="-250" data-swiper-parallax-opacity="0">
                                
                                <!-- Floating Pill Badge -->
                                <div class="inline-flex items-center space-x-2 bg-[#FE5D37] text-white text-[11px] sm:text-xs md:text-sm font-bold tracking-wider uppercase px-3.5 sm:px-4 py-1 sm:py-1.5 rounded-full shadow-lg mb-3 sm:mb-4">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span>CBSE Affiliated • Admissions 2026-27</span>
                                </div>

                                <!-- Headline Title -->
                                @if($slider->title)
                                <h1 class="hero-title text-white text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-bold font-lobster leading-[1.2] sm:leading-[1.15] mb-3 sm:mb-4 drop-shadow-md">
                                    {{ $slider->title }}
                                </h1>
                                @endif

                                <!-- Subtitle / Paragraph -->
                                @if($slider->subtitle)
                                <p class="hero-subtitle text-white/95 text-xs sm:text-sm md:text-base lg:text-lg font-normal leading-relaxed mb-6 sm:mb-8 max-w-2xl line-clamp-3 sm:line-clamp-none">
                                    {{ $slider->subtitle }}
                                </p>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                                    @if($slider->button_link)
                                    <a href="{{ $slider->button_link }}" class="btn-kider inline-flex items-center text-xs sm:text-sm px-5 sm:px-7 py-2.5 sm:py-3.5 shadow-xl hover:shadow-orange-500/40 transform hover:-translate-y-1 transition-all duration-300">
                                        <span>{{ $slider->button_text ?: 'Apply for Admission' }}</span>
                                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admissions') }}" class="btn-kider inline-flex items-center text-xs sm:text-sm px-5 sm:px-7 py-2.5 sm:py-3.5 shadow-xl hover:shadow-orange-500/40 transform hover:-translate-y-1 transition-all duration-300">
                                        <span>Apply for Admission</span>
                                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                    @endif

                                    <a href="#classes" class="inline-flex items-center px-4 sm:px-6 py-2.5 sm:py-3.5 rounded-full font-bold text-xs sm:text-sm text-white bg-white/20 hover:bg-white hover:text-[#103741] border border-white/40 backdrop-blur-md shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                        <i class="fa-solid fa-shapes mr-2 text-[#FE5D37]"></i>
                                        <span>Our Classes</span>
                                    </a>
                                </div>

                                <!-- Trust Markers Strip -->
                                <div class="hidden sm:flex items-center flex-wrap gap-4 sm:gap-6 mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-white/25 text-white text-xs sm:text-sm font-medium" style="color: #ffffff !important; text-shadow: 0 1px 3px rgba(0,0,0,0.5);">
                                    <span class="inline-flex items-center"><i class="fa-solid fa-circle-check text-[#FE5D37] mr-1.5 sm:mr-2"></i> LEAD Curriculum</span>
                                    <span class="inline-flex items-center"><i class="fa-solid fa-circle-check text-[#FE5D37] mr-1.5 sm:mr-2"></i> Smart Classes</span>
                                    <span class="inline-flex items-center"><i class="fa-solid fa-circle-check text-[#FE5D37] mr-1.5 sm:mr-2"></i> Safe Campus & Bus</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach   
            @else
                <!-- Fallback Slide 1 -->
                <div class="swiper-slide" style="position: relative; width: 100%; height: 100%; min-height: 520px; overflow: hidden; background-color: #103741;">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden;">
                        <img src="{{ page_image('home.hero_fallback_campus') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; filter: blur(20px); transform: scale(1.1); opacity: 0.35; pointer-events: none;" aria-hidden="true" alt="">
                        <img src="{{ page_image('home.hero_fallback_campus') }}" class="hero-slide-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center center;" alt="{{ page_image_alt('home.hero_fallback_campus') }}">
                    </div>
                    <div class="hidden md:block hero-overlay-desktop" 
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; background: linear-gradient(90deg, rgba(16, 55, 65, 0.88) 0%, rgba(16, 55, 65, 0.65) 35%, rgba(16, 55, 65, 0.18) 65%, transparent 100%);"></div>
                    <div class="block md:hidden hero-overlay-mobile" 
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; background: linear-gradient(180deg, rgba(16, 55, 65, 0.3) 0%, rgba(16, 55, 65, 0.6) 45%, rgba(16, 55, 65, 0.92) 100%);"></div>
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; background: linear-gradient(180deg, rgba(16, 55, 65, 0.4) 0%, transparent 18%, transparent 82%, rgba(16, 55, 65, 0.5) 100%);"></div>
                    <div class="hero-slide-content relative h-full flex items-center z-10 py-10 sm:py-14 md:py-16" style="position: relative; z-index: 10; width: 100%; min-height: 520px;">
                        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="w-full sm:w-11/12 md:w-9/12 lg:w-7/12 xl:w-7/12" data-swiper-parallax="-250" data-swiper-parallax-opacity="0">
                                <div class="inline-flex items-center space-x-2 bg-[#FE5D37] text-white text-[11px] sm:text-xs md:text-sm font-bold tracking-wider uppercase px-3.5 sm:px-4 py-1 sm:py-1.5 rounded-full shadow-lg mb-3 sm:mb-4">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span>CBSE Affiliated • Admissions 2026-27</span>
                                </div>
                                <h1 class="hero-title text-white text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-bold font-lobster leading-[1.2] sm:leading-[1.15] mb-3 sm:mb-4 drop-shadow-md">The Best Educational Start For Your Child</h1>
                                <p class="hero-subtitle text-white/95 text-xs sm:text-sm md:text-base lg:text-lg font-normal leading-relaxed mb-6 sm:mb-8 max-w-2xl line-clamp-3 sm:line-clamp-none">State-of-the-art facilities designed to foster creativity, focus, and excellence in every student.</p>
                                <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                                    <a href="{{ route('admissions') }}" class="btn-kider inline-flex items-center text-xs sm:text-sm px-5 sm:px-7 py-2.5 sm:py-3.5 shadow-xl hover:shadow-orange-500/40 transform hover:-translate-y-1 transition-all duration-300">
                                        <span>Apply for Admission</span>
                                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                    <a href="#classes" class="inline-flex items-center px-4 sm:px-6 py-2.5 sm:py-3.5 rounded-full font-bold text-xs sm:text-sm text-white bg-white/20 hover:bg-white hover:text-[#103741] border border-white/40 backdrop-blur-md shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                        <i class="fa-solid fa-shapes mr-2 text-[#FE5D37]"></i>
                                        <span>Our Classes</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Elegant Navigation Controls (Cleanly positioned on right side) -->
        <div class="hidden sm:flex absolute bottom-8 sm:bottom-12 right-4 sm:right-8 md:right-12 z-20 space-x-2 sm:space-x-3">
            <button type="button" aria-label="Previous Slide" class="swiper-button-prev-custom w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 rounded-full bg-white/10 hover:bg-[#FE5D37] border border-white/25 backdrop-blur-md flex items-center justify-center text-white cursor-pointer transition-all duration-300 shadow-xl hover:scale-105 active:scale-95 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button type="button" aria-label="Next Slide" class="swiper-button-next-custom w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 rounded-full bg-white/10 hover:bg-[#FE5D37] border border-white/25 backdrop-blur-md flex items-center justify-center text-white cursor-pointer transition-all duration-300 shadow-xl hover:scale-105 active:scale-95 group">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
        
        <!-- Minimalist Pagination with Pill Indicator -->
        <div class="swiper-pagination !bottom-5 sm:!bottom-8 md:!bottom-12 !left-4 sm:!left-6 md:!left-12 !w-auto !text-left z-20"></div>
    </div>
    
    <!-- Kider Cloud Border Bottom -->
    <div class="absolute bottom-0 left-0 right-0 z-30 w-full h-[15px] md:h-[20px] lg:h-[25px] pointer-events-none" style="background: url('{{ page_image('site.header_bottom') }}') bottom center repeat-x; background-size: contain;"></div>
</section>

<!-- 2. Kider Facilities -->
<section class="py-24 bg-white" id="facilities">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mx-auto max-w-2xl mb-16">
            <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-4">School Facilities</h1>
            <p class="text-[#74787C]">We provide a safe, nurturing, and modern environment to help your child grow and thrive.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            <!-- Facility 1 -->
            <div class="bg-[#FFF5F3] rounded-3xl p-8 shadow-sm kider-card group">
                <div class="w-24 h-24 bg-[#FE5D37] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-bus text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">School Bus</h3>
                <p class="text-[#74787C] text-sm">Safe and reliable transportation for students.</p>
            </div>
            <!-- Facility 2 -->
            <div class="bg-[#F0F8FF] rounded-3xl p-8 shadow-sm kider-card-alt group">
                <div class="w-24 h-24 bg-[#103741] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-futbol text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">Playground</h3>
                <p class="text-[#74787C] text-sm">Expansive areas for sports and physical activities.</p>
            </div>
            <!-- Facility 3 -->
            <div class="bg-[#FFF5F3] rounded-3xl p-8 shadow-sm kider-card group">
                <div class="w-24 h-24 bg-[#FE5D37] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-utensils text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">Healthy Canteen</h3>
                <p class="text-[#74787C] text-sm">Nutritious meals prepared in a hygienic environment.</p>
            </div>
            <!-- Facility 4 -->
            <div class="bg-[#F0F8FF] rounded-3xl p-8 shadow-sm kider-card-alt group">
                <div class="w-24 h-24 bg-[#103741] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-book-open text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">Smart Classes</h3>
                <p class="text-[#74787C] text-sm">Interactive learning with modern technology.</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Notices Section -->
@if(isset($latest_notices) && $latest_notices->count() > 0)
<section class="py-24 bg-[#FFF5F3]">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mx-auto max-w-2xl mb-16">
            <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-4">School Notice Board</h1>
            <p class="text-[#74787C]">Stay updated with our most recent announcements and important events.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latest_notices as $notice)
            <div class="bg-white rounded-3xl p-8 shadow-sm kider-card group hover:shadow-md transition-all h-full flex flex-col">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-[#FE5D37] rounded-full flex flex-col items-center justify-center text-white shrink-0 group-hover:bg-[#103741] transition-colors">
                        <span class="text-2xl font-bold font-lobster leading-none">{{ \Carbon\Carbon::parse($notice->date)->format('d') }}</span>
                        <span class="text-xs font-bold uppercase">{{ \Carbon\Carbon::parse($notice->date)->format('M') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#103741] font-lobster line-clamp-2">{{ $notice->title }}</h3>
                </div>
                <p class="text-[#74787C] text-sm line-clamp-3 mb-6 flex-grow">
                    {{ Str::limit(strip_tags($notice->content), 120) }}
                </p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('notices.index') }}" class="btn-kider inline-block px-8 py-4 rounded-full text-white bg-[#FE5D37] hover:bg-[#103741] transition-colors">View All Notices</a>
        </div>
    </div>
</section>
@endif

<!-- 3. Kider About Us -->
<section id="about" class="py-24 bg-white relative">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Image Area -->
            <div class="w-full lg:w-1/2 relative animate-[float_4s_ease-in-out_infinite]">
                <div class="relative rounded-blob overflow-hidden w-[90%] aspect-square mx-auto shadow-xl border-[15px] border-[#FFF5F3]">
                    <img src="{{ page_image('home.about') }}" class="w-full h-full object-cover" alt="{{ page_image_alt('home.about') }}">
                </div>
                <div class="absolute bottom-10 right-10 w-32 h-32 bg-[#FE5D37] rounded-full flex flex-col items-center justify-center text-white shadow-lg animate-bounce border-[10px] border-white">
                    <h1 class="text-3xl font-bold font-lobster">15+</h1>
                    <p class="text-xs font-bold uppercase">Years</p>
                </div>
            </div>
            
            <!-- Text Area -->
            <div class="w-full lg:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-6 leading-tight">Learn More About Our Work And Our Cultural Activities</h1>
                <p class="text-[#74787C] text-lg mb-6 leading-relaxed">
                    At Sunrise English Medium School, we go beyond traditional education. Our institution is built on strong values, offering a nurturing environment where students are encouraged to question, explore, and discover their true capabilities.
                </p>
                <p class="text-[#74787C] mb-8 leading-relaxed">
                    We strictly follow the CBSE curriculum, ensuring students build strong conceptual clarity.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-[#FFF5F3] rounded-full flex items-center justify-center mr-3">
                            <i class="fa-solid fa-check text-[#FE5D37]"></i>
                        </div>
                        <span class="font-bold text-[#103741]">CBSE Curriculum</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-[#FFF5F3] rounded-full flex items-center justify-center mr-3">
                            <i class="fa-solid fa-check text-[#FE5D37]"></i>
                        </div>
                        <span class="font-bold text-[#103741]">Expert Teachers</span>
                    </div>
                </div>
                <a href="#contact" class="btn-kider inline-block">Read More</a>
            </div>
        </div>
    </div>
</section>

<!-- 4. Call to Action (Become A Teacher -> Admission) -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="bg-[#FFF5F3] rounded-[50px] p-8 md:p-16 relative overflow-hidden">
            <div class="flex flex-col lg:flex-row items-center gap-12 relative z-10">
                <div class="w-full lg:w-1/2 animate-[float_5s_ease-in-out_infinite]">
                    <div class="rounded-blob overflow-hidden w-full aspect-[4/3] border-[10px] border-white shadow-lg">
                        <img src="{{ page_image('home.admission') }}" class="w-full h-full object-cover" alt="{{ page_image_alt('home.admission') }}">
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-6">Apply For Admission</h1>
                    <p class="text-[#74787C] mb-8 text-lg">Admissions for the upcoming academic year are now open. Secure a seat at Sunrise English Medium School today and give your child the best start.</p>
                    <a href="#contact" class="btn-kider">Apply Now <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Classes -->
<section id="classes" class="py-24 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mx-auto max-w-2xl mb-16">
            <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-4">Academic Programs</h1>
            <p class="text-[#74787C]">We offer a structured and comprehensive curriculum designed to build a strong foundation for future success.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Class 1 -->
            <div class="group">
                <!-- Image Circle -->
                <div class="bg-[#FFF5F3] rounded-full w-3/4 mx-auto p-4 relative z-10 transition-transform duration-300 group-hover:scale-105">
                    <img class="w-full h-full object-cover rounded-full aspect-square border-4 border-white shadow-sm" src="{{ page_image('home.program_primary') }}" alt="{{ page_image_alt('home.program_primary') }}">
                </div>
                <!-- Card Body -->
                <div class="bg-[#FFF5F3] rounded-3xl p-8 pt-16 -mt-12 transition-colors duration-300 hover:bg-orange-50 relative z-0">
                    <a class="block text-center text-3xl font-bold font-lobster text-[#103741] mb-4 hover:text-[#FE5D37] transition-colors" href="#">Pre-Primary & Primary</a>
                    <p class="text-[#74787C] text-center mb-8">Building strong foundational skills in reading, writing, and mathematics.</p>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-200 pt-6">
                        <div class="border-t-4 border-[#FE5D37] pt-2 text-center -mt-6">
                            <h6 class="text-[#FE5D37] font-bold mb-1 text-sm uppercase tracking-wide">Age</h6>
                            <small class="text-[#74787C] font-semibold">3-10 Years</small>
                        </div>
                        <div class="border-t-4 border-green-500 pt-2 text-center -mt-6">
                            <h6 class="text-green-500 font-bold mb-1 text-sm uppercase tracking-wide">Time</h6>
                            <small class="text-[#74787C] font-semibold">9 AM - 3 PM</small>
                        </div>
                        <div class="border-t-4 border-yellow-500 pt-2 text-center -mt-6">
                            <h6 class="text-yellow-500 font-bold mb-1 text-sm uppercase tracking-wide">Capacity</h6>
                            <small class="text-[#74787C] font-semibold">40 Kids</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Class 2 -->
            <div class="group">
                <!-- Image Circle -->
                <div class="bg-[#FFF5F3] rounded-full w-3/4 mx-auto p-4 relative z-10 transition-transform duration-300 group-hover:scale-105">
                    <img class="w-full h-full object-cover rounded-full aspect-square border-4 border-white shadow-sm" src="{{ page_image('home.program_upper_primary') }}" alt="{{ page_image_alt('home.program_upper_primary') }}">
                </div>
                <!-- Card Body -->
                <div class="bg-[#FFF5F3] rounded-3xl p-8 pt-16 -mt-12 transition-colors duration-300 hover:bg-orange-50 relative z-0">
                    <a class="block text-center text-3xl font-bold font-lobster text-[#103741] mb-4 hover:text-[#FE5D37] transition-colors" href="#">Upper Primary (6-8)</a>
                    <p class="text-[#74787C] text-center mb-8">Developing critical thinking and subject-specific knowledge.</p>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-200 pt-6">
                        <div class="border-t-4 border-[#FE5D37] pt-2 text-center -mt-6">
                            <h6 class="text-[#FE5D37] font-bold mb-1 text-sm uppercase tracking-wide">Age</h6>
                            <small class="text-[#74787C] font-semibold">11-13 Years</small>
                        </div>
                        <div class="border-t-4 border-green-500 pt-2 text-center -mt-6">
                            <h6 class="text-green-500 font-bold mb-1 text-sm uppercase tracking-wide">Time</h6>
                            <small class="text-[#74787C] font-semibold">8 AM - 2 PM</small>
                        </div>
                        <div class="border-t-4 border-yellow-500 pt-2 text-center -mt-6">
                            <h6 class="text-yellow-500 font-bold mb-1 text-sm uppercase tracking-wide">Capacity</h6>
                            <small class="text-[#74787C] font-semibold">40 Kids</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Class 3 -->
            <div class="group">
                <!-- Image Circle -->
                <div class="bg-[#FFF5F3] rounded-full w-3/4 mx-auto p-4 relative z-10 transition-transform duration-300 group-hover:scale-105">
                    <img class="w-full h-full object-cover rounded-full aspect-square border-4 border-white shadow-sm" src="{{ page_image('home.program_secondary') }}" alt="{{ page_image_alt('home.program_secondary') }}">
                </div>
                <!-- Card Body -->
                <div class="bg-[#FFF5F3] rounded-3xl p-8 pt-16 -mt-12 transition-colors duration-300 hover:bg-orange-50 relative z-0">
                    <a class="block text-center text-3xl font-bold font-lobster text-[#103741] mb-4 hover:text-[#FE5D37] transition-colors" href="#">Secondary (9-10)</a>
                    <p class="text-[#74787C] text-center mb-8">Comprehensive preparation for board exams with a focus on core subjects.</p>
                    <div class="grid grid-cols-3 gap-2 border-t border-gray-200 pt-6">
                        <div class="border-t-4 border-[#FE5D37] pt-2 text-center -mt-6">
                            <h6 class="text-[#FE5D37] font-bold mb-1 text-sm uppercase tracking-wide">Age</h6>
                            <small class="text-[#74787C] font-semibold">14-15 Years</small>
                        </div>
                        <div class="border-t-4 border-green-500 pt-2 text-center -mt-6">
                            <h6 class="text-green-500 font-bold mb-1 text-sm uppercase tracking-wide">Time</h6>
                            <small class="text-[#74787C] font-semibold">8 AM - 4 PM</small>
                        </div>
                        <div class="border-t-4 border-yellow-500 pt-2 text-center -mt-6">
                            <h6 class="text-yellow-500 font-bold mb-1 text-sm uppercase tracking-wide">Capacity</h6>
                            <small class="text-[#74787C] font-semibold">40 Kids</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Appointment (Make Appointment) -->
<section id="contact" class="py-24 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="bg-[#FFF5F3] rounded-3xl overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/2 p-10 lg:p-16 flex flex-col justify-center">
                    <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-6">Make Appointment</h1>
                    <p class="text-[#74787C] mb-8">Ready to start the admission process or want to learn more? Schedule a visit to our campus today.</p>
                    @if (session('appointment_success'))
                        <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-2xl shadow-sm mb-6 flex items-start gap-3">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mt-0.5 shrink-0"></i>
                            <div>
                                <p class="font-bold text-sm">Appointment Requested!</p>
                                <p class="text-xs mt-0.5 text-green-700">{{ session('appointment_success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-2xl shadow-sm mb-6 text-xs">
                            <p class="font-bold mb-1">Please correct the following errors:</p>
                            <ul class="list-disc pl-4 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" placeholder="Guardian Name *" required 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('guardian_name') border-red-400 @enderror">
                                @error('guardian_name')
                                    <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="email" name="guardian_email" value="{{ old('guardian_email') }}" placeholder="Guardian Email *" required 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('guardian_email') border-red-400 @enderror">
                                @error('guardian_email')
                                    <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="tel" name="guardian_phone" value="{{ old('guardian_phone') }}" placeholder="Guardian Phone (Optional)" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm">
                            </div>
                            <div>
                                <input type="text" name="child_name" value="{{ old('child_name') }}" placeholder="Child Name *" required 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('child_name') border-red-400 @enderror">
                                @error('child_name')
                                    <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <input type="text" name="child_age" value="{{ old('child_age') }}" placeholder="Child Age / Grade Applying For *" required 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('child_age') border-red-400 @enderror">
                                @error('child_age')
                                    <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6">
                            <textarea name="message" placeholder="Preferred Visit Date / Any Questions (Optional)" rows="3" 
                                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn-kider w-full py-4 text-base font-bold shadow-lg hover:shadow-xl transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-calendar-check"></i>
                            <span>Schedule Appointment</span>
                        </button>
                    </form>
                </div>
                <div class="w-full lg:w-1/2 relative min-h-[400px]">
                    <img src="{{ page_image('home.appointment') }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ page_image_alt('home.appointment') }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Team (Our Visionaries) -->
<section class="py-20 md:py-28 bg-[#FFFDFB] relative overflow-hidden" id="visionaries">
    <!-- Subtle Ambient Background Accents -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-orange-100/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#103741]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mx-auto max-w-2xl mb-16">
            <span class="inline-flex items-center gap-2 bg-[#FFF5F3] text-[#FE5D37] px-4 py-1.5 rounded-full text-xs font-bold tracking-wider uppercase mb-3 border border-orange-200/60 shadow-xs">
                <i class="fa-solid fa-star text-[10px]"></i> Guiding Pillars
            </span>
            <h2 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-3">Our Visionaries</h2>
            <div class="w-20 h-1.5 bg-gradient-to-r from-[#FE5D37] to-[#103741] mx-auto rounded-full mb-4"></div>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed max-w-xl mx-auto">
                The visionary leadership steering Sunrise English Medium School towards academic distinction, moral values, and global excellence.
            </p>
        </div>

        <!-- Visionaries Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
            <!-- 1. Founder -->
            <div class="group relative bg-gradient-to-b from-white via-[#FFFBF9] to-[#FFF5F0] rounded-[2.5rem] p-8 border border-orange-100/90 shadow-sm hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col items-center text-center">
                <!-- Royal Portrait Medallion -->
                <div class="relative mb-6 inline-block">
                    <!-- Outer Halo / Glow -->
                    <div class="p-2 rounded-full bg-gradient-to-tr from-[#FE5D37] via-orange-300 to-[#103741] shadow-xl group-hover:scale-105 transition-all duration-500">
                        <!-- Inner Bevel Ring -->
                        <div class="p-1.5 rounded-full bg-white shadow-inner">
                            <!-- Image Frame -->
                            <div class="w-48 h-48 sm:w-52 sm:h-52 rounded-full overflow-hidden bg-gray-100">
                                <img src="{{ page_image('home.founder') }}" 
                                     alt="{{ page_image_alt('home.founder') }}" 
                                     class="w-full h-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700 ease-out"
                                     style="object-position: center 10%; image-rendering: -webkit-optimize-contrast;">
                            </div>
                        </div>
                    </div>
                    <!-- Role Badge -->
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 whitespace-nowrap z-10">
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider text-white shadow-lg bg-gradient-to-r from-[#FE5D37] to-[#e84c25] border-2 border-white">
                            <i class="fa-solid fa-crown text-[10px] text-amber-200"></i>
                            <span>Founder</span>
                        </span>
                    </div>
                </div>

                <h3 class="text-2xl font-bold font-lobster text-[#103741] group-hover:text-[#FE5D37] transition-colors mt-2 mb-1">
                    Mr. Yogesh Bobade
                </h3>
                <p class="text-xs font-bold text-[#FE5D37] uppercase tracking-wider mb-2">
                    Founder & Chairman
                </p>
                <div class="w-10 h-0.5 bg-orange-200 group-hover:w-16 group-hover:bg-[#FE5D37] mx-auto rounded-full transition-all duration-300 mb-3"></div>
                <p class="text-gray-500 text-xs sm:text-sm leading-relaxed italic mb-4">
                    "Dedicated to providing every child with an atmosphere of curiosity, dignity, and academic excellence."
                </p>
                <div class="mt-auto pt-3 border-t border-orange-100/80 w-full text-[11px] font-semibold text-gray-400 uppercase tracking-wider">
                    Patron • Sunrise Trust
                </div>
            </div>

            <!-- 2. Secretary -->
            <div class="group relative bg-gradient-to-b from-white via-[#FFFBF9] to-[#FFF5F0] rounded-[2.5rem] p-8 border border-orange-100/90 shadow-sm hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col items-center text-center">
                <!-- Royal Portrait Medallion -->
                <div class="relative mb-6 inline-block">
                    <!-- Outer Halo / Glow -->
                    <div class="p-2 rounded-full bg-gradient-to-tr from-[#103741] via-teal-700 to-[#FE5D37] shadow-xl group-hover:scale-105 transition-all duration-500">
                        <!-- Inner Bevel Ring -->
                        <div class="p-1.5 rounded-full bg-white shadow-inner">
                            <!-- Image Frame -->
                            <div class="w-48 h-48 sm:w-52 sm:h-52 rounded-full overflow-hidden bg-gray-100">
                                <img src="{{ page_image('home.secretary') }}" 
                                     alt="{{ page_image_alt('home.secretary') }}" 
                                     class="w-full h-full object-cover object-center transform scale-105 group-hover:scale-115 transition-transform duration-700 ease-out"
                                     style="object-position: center center; image-rendering: -webkit-optimize-contrast;">
                            </div>
                        </div>
                    </div>
                    <!-- Role Badge -->
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 whitespace-nowrap z-10">
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider text-white shadow-lg bg-gradient-to-r from-[#103741] to-[#1c5563] border-2 border-white">
                            <i class="fa-solid fa-award text-[10px] text-amber-300"></i>
                            <span>Secretary</span>
                        </span>
                    </div>
                </div>

                <h3 class="text-2xl font-bold font-lobster text-[#103741] group-hover:text-[#FE5D37] transition-colors mt-2 mb-1">
                    Mrs. Suruja Yogesh Bobade
                </h3>
                <p class="text-xs font-bold text-[#103741] uppercase tracking-wider mb-2">
                    Hon. Secretary
                </p>
                <div class="w-10 h-0.5 bg-orange-200 group-hover:w-16 group-hover:bg-[#103741] mx-auto rounded-full transition-all duration-300 mb-3"></div>
                <p class="text-gray-500 text-xs sm:text-sm leading-relaxed italic mb-4">
                    "Dedicated to progressive infrastructure, holistic safety, and ensuring modern resources for every learner."
                </p>
                <div class="mt-auto pt-3 border-t border-orange-100/80 w-full text-[11px] font-semibold text-gray-400 uppercase tracking-wider">
                    Administration & Governance
                </div>
            </div>

            <!-- 3. Principal -->
            <div class="group relative bg-gradient-to-b from-white via-[#FFFBF9] to-[#FFF5F0] rounded-[2.5rem] p-8 border border-orange-100/90 shadow-sm hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col items-center text-center">
                <!-- Royal Portrait Medallion -->
                <div class="relative mb-6 inline-block">
                    <!-- Outer Halo / Glow -->
                    <div class="p-2 rounded-full bg-gradient-to-tr from-[#FE5D37] via-orange-300 to-[#103741] shadow-xl group-hover:scale-105 transition-all duration-500">
                        <!-- Inner Bevel Ring -->
                        <div class="p-1.5 rounded-full bg-white shadow-inner">
                            <!-- Image Frame -->
                            <div class="w-48 h-48 sm:w-52 sm:h-52 rounded-full overflow-hidden bg-gray-100">
                                <img src="{{ page_image('home.principal') }}" 
                                     alt="{{ page_image_alt('home.principal') }}" 
                                     class="w-full h-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700 ease-out"
                                     style="object-position: center 10%; image-rendering: -webkit-optimize-contrast;">
                            </div>
                        </div>
                    </div>
                    <!-- Role Badge -->
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 whitespace-nowrap z-10">
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider text-white shadow-lg bg-gradient-to-r from-[#FE5D37] to-[#e84c25] border-2 border-white">
                            <i class="fa-solid fa-graduation-cap text-[10px] text-amber-200"></i>
                            <span>Principal</span>
                        </span>
                    </div>
                </div>

                <h3 class="text-2xl font-bold font-lobster text-[#103741] group-hover:text-[#FE5D37] transition-colors mt-2 mb-1">
                    Mrs. Shahida Aslam Pathan
                </h3>
                <p class="text-xs font-bold text-[#FE5D37] uppercase tracking-wider mb-2">
                    Academic Director & Principal
                </p>
                <div class="w-10 h-0.5 bg-orange-200 group-hover:w-16 group-hover:bg-[#FE5D37] mx-auto rounded-full transition-all duration-300 mb-3"></div>
                <p class="text-gray-500 text-xs sm:text-sm leading-relaxed italic mb-4">
                    "Cultivating curious minds through innovative CBSE curriculum, experiential pedagogy, and character excellence."
                </p>
                <div class="mt-auto pt-3 border-t border-orange-100/80 w-full text-[11px] font-semibold text-gray-400 uppercase tracking-wider">
                    Academics & Pedagogy
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
    /* Guaranteed Responsive Dimensions for Hero Slider */
    .hero-slider-section {
        position: relative !important;
        width: 100% !important;
        overflow: hidden !important;
        background-color: #103741 !important;
        min-height: 500px !important;
        height: 72vh !important;
        max-height: 750px !important;
    }
    @media (max-width: 640px) {
        .hero-slider-section {
            min-height: 480px !important;
            height: 65vh !important;
            max-height: 560px !important;
        }
    }
    @media (min-width: 1024px) {
        .hero-slider-section {
            min-height: 580px !important;
            height: 76vh !important;
            max-height: 800px !important;
        }
    }

    .heroSwiper {
        width: 100% !important;
        height: 100% !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
    }

    .heroSwiper .swiper-wrapper {
        display: flex !important;
        width: 100% !important;
        height: 100% !important;
    }

    .heroSwiper .swiper-slide {
        position: relative !important;
        flex-shrink: 0 !important;
        width: 100% !important;
        height: 100% !important;
        min-height: 500px !important;
        overflow: hidden !important;
        background-color: #103741 !important;
    }

    /* Image Sharpness & Cross-Fade Zoom */
    .hero-slide-img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center !important;
        image-orientation: from-image;
    }

    /* Subtle slow zoom animation on active slide image */
    .heroSwiper .swiper-slide-active .hero-slide-img {
        transform: scale(1.04);
    }

    /* Typography & Contrast */
    .hero-title {
        color: #ffffff !important;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.85);
    }
    .hero-subtitle {
        color: rgba(255, 255, 255, 0.95) !important;
        text-shadow: 0 1px 6px rgba(0, 0, 0, 0.75);
    }

    /* Premium Hero Slider Custom Pagination */
    .heroSwiper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.65);
        opacity: 1;
        transition: all 0.4s ease;
        border-radius: 9999px;
        margin: 0 4px !important;
        display: inline-block;
        cursor: pointer;
    }
    .heroSwiper .swiper-pagination-bullet-active {
        width: 32px !important;
        background: #FE5D37 !important;
        box-shadow: 0 4px 12px rgba(254, 93, 55, 0.6);
    }
</style>
<script>
    function initHeroSwiper() {
        if(typeof Swiper !== 'undefined') {
            const heroSwiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                speed: 1200,
                autoplay: {
                    delay: 5500,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                parallax: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                }
            });
        } else {
            setTimeout(initHeroSwiper, 150);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeroSwiper);
    } else {
        initHeroSwiper();
    }
</script>
@endpush
