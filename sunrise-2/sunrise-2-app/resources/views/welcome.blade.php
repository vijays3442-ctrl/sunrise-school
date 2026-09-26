@extends('layouts.public')

@section('content')

<!-- 1. Kider-Style Hero Section -->
<section class="relative w-full overflow-hidden" style="height: 90vh; min-height: 650px;">
    <!-- Kider Cloud Border Top -->
    <div class="absolute top-0 left-0 right-0 z-30 w-full h-[15px] md:h-[20px] lg:h-[25px] pointer-events-none" style="background: url('{{ page_image('site.header_top') }}') top center repeat-x; background-size: contain;"></div>

    <!-- Main Slider -->
    <div class="swiper heroSwiper h-full w-full absolute inset-0">
        <div class="swiper-wrapper">
            @if(isset($sliders) && $sliders->count() > 0)
                @foreach($sliders as $slider)
                <div class="swiper-slide relative">
                    <img src="{{ asset($slider->image_path) }}" class="w-full h-full object-cover absolute inset-0" alt="{{ $slider->title }}">
                    <div class="absolute inset-0 bg-black/30 flex items-center">
                        <div class="container mx-auto px-4 lg:px-8">
                            <div class="w-full lg:w-8/12" data-swiper-parallax="-400" data-swiper-parallax-opacity="0">
                                <h1 class="text-white text-5xl md:text-6xl lg:text-7xl font-bold mb-4 font-lobster leading-tight mt-10">{{ $slider->title }}</h1>
                                <p class="text-white text-lg md:text-xl font-medium mb-8">{{ $slider->subtitle }}</p>
                                @if($slider->button_link)
                                <a href="{{ $slider->button_link }}" class="btn-kider inline-block mr-3 shadow-lg">{{ $slider->button_text ?? 'Learn More' }}</a>
                                @endif
                                <a href="#classes" class="btn-kider bg-[#103741] inline-block hover:bg-[#FE5D37] shadow-lg">Our Classes</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach   
            @else
                <!-- Slide 1 -->
                <div class="swiper-slide relative">
                    <img src="{{ page_image('home.hero_fallback_campus') }}" class="w-full h-full object-cover absolute inset-0" alt="{{ page_image_alt('home.hero_fallback_campus') }}">
                    <div class="absolute inset-0 bg-black/30 flex items-center">
                        <div class="container mx-auto px-4 lg:px-8">
                            <div class="w-full lg:w-8/12" data-swiper-parallax="-400" data-swiper-parallax-opacity="0">
                                <h1 class="text-white text-5xl md:text-6xl lg:text-7xl font-bold mb-4 font-lobster leading-tight mt-10">The Best Educational Start For Your Child</h1>
                                <p class="text-white text-lg md:text-xl font-medium mb-8">State-of-the-art facilities designed to foster creativity, focus, and excellence in every student.</p>
                                <a href="#about" class="btn-kider inline-block mr-3 shadow-lg">Learn More</a>
                                <a href="#classes" class="btn-kider bg-[#103741] inline-block hover:bg-[#FE5D37] shadow-lg">Our Classes</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="swiper-slide relative">
                    <img src="{{ page_image('home.hero_fallback_students') }}" class="w-full h-full object-cover absolute inset-0" alt="{{ page_image_alt('home.hero_fallback_students') }}">
                    <div class="absolute inset-0 bg-black/30 flex items-center">
                        <div class="container mx-auto px-4 lg:px-8">
                            <div class="w-full lg:w-8/12" data-swiper-parallax="-400" data-swiper-parallax-opacity="0">
                                <h1 class="text-white text-5xl md:text-6xl lg:text-7xl font-bold mb-4 font-lobster leading-tight mt-10">Make A Brighter Future For Your Child</h1>
                                <p class="text-white text-lg md:text-xl font-medium mb-8">Celebrating milestones, encouraging extracurriculars, and building lifelong memories together.</p>
                                <a href="#gallery" class="btn-kider inline-block mr-3 shadow-lg">Learn More</a>
                                <a href="#classes" class="btn-kider bg-[#103741] inline-block hover:bg-[#FE5D37] shadow-lg">Our Classes</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Elegant Navigation Controls -->
        <div class="absolute bottom-16 right-10 z-20 flex space-x-4 hidden md:flex">
            <div class="swiper-button-prev-custom w-14 h-14 rounded-full border border-white/30 backdrop-blur-sm flex items-center justify-center text-white hover:bg-[#FE5D37] hover:border-[#FE5D37] cursor-pointer transition-all duration-300 group">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </div>
            <div class="swiper-button-next-custom w-14 h-14 rounded-full border border-white/30 backdrop-blur-sm flex items-center justify-center text-white hover:bg-[#FE5D37] hover:border-[#FE5D37] cursor-pointer transition-all duration-300 group">
                <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </div>
        
        <!-- Minimalist Pagination -->
        <div class="swiper-pagination !bottom-16 !left-10 !w-auto !text-left z-20"></div>
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
            <div class="bg-[#FFF5F3] rounded-full p-8 shadow-sm kider-card group">
                <div class="w-24 h-24 bg-[#FE5D37] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-bus text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">School Bus</h3>
                <p class="text-[#74787C] text-sm">Safe and reliable transportation for students.</p>
            </div>
            <!-- Facility 2 -->
            <div class="bg-[#F0F8FF] rounded-full p-8 shadow-sm kider-card-alt group">
                <div class="w-24 h-24 bg-[#103741] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-futbol text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">Playground</h3>
                <p class="text-[#74787C] text-sm">Expansive areas for sports and physical activities.</p>
            </div>
            <!-- Facility 3 -->
            <div class="bg-[#FFF5F3] rounded-full p-8 shadow-sm kider-card group">
                <div class="w-24 h-24 bg-[#FE5D37] rounded-full flex items-center justify-center mx-auto mb-6 transition-transform duration-300 group-hover:scale-110 kider-icon-container">
                    <i class="fa-solid fa-utensils text-4xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">Healthy Canteen</h3>
                <p class="text-[#74787C] text-sm">Nutritious meals prepared in a hygienic environment.</p>
            </div>
            <!-- Facility 4 -->
            <div class="bg-[#F0F8FF] rounded-full p-8 shadow-sm kider-card-alt group">
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
<section class="py-24 bg-white">
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
                    <form>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <input type="text" placeholder="Guardian Name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                            <input type="email" placeholder="Guardian Email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                            <input type="text" placeholder="Child Name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                            <input type="text" placeholder="Child Age" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                        </div>
                        <textarea placeholder="Message" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] mb-6"></textarea>
                        <button class="btn-kider w-full py-4 text-lg">Submit</button>
                    </form>
                </div>
                <div class="w-full lg:w-1/2 relative min-h-[400px]">
                    <img src="{{ page_image('home.appointment') }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ page_image_alt('home.appointment') }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Team (Guiding Lights) -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mx-auto max-w-2xl mb-16">
            <h1 class="text-4xl md:text-5xl font-bold font-lobster text-[#103741] mb-4">Our Visionaries</h1>
            <p class="text-[#74787C]">The guiding lights of Sunrise English Medium School.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Founder -->
            <div class="text-center group kider-card p-6 rounded-3xl">
                <div class="relative w-64 h-64 mx-auto rounded-blob overflow-hidden mb-6 border-[10px] border-[#FFF5F3] group-hover:border-[#FE5D37] transition-colors duration-300">
                    <img src="{{ page_image('home.founder') }}" class="w-full h-full object-cover" alt="{{ page_image_alt('home.founder') }}">
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-1">Mr.Yogesh Bobade</h3>
                <p class="text-[#FE5D37] font-bold mb-4">Founder</p>
            </div>
            <!-- Secretary -->
            <div class="text-center group kider-card p-6 rounded-3xl">
                <div class="relative w-64 h-64 mx-auto rounded-blob overflow-hidden mb-6 border-[10px] border-[#FFF5F3] group-hover:border-[#FE5D37] transition-colors duration-300">
                    <img src="{{ page_image('home.secretary') }}" class="w-full h-full object-cover" alt="{{ page_image_alt('home.secretary') }}">
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-1">Mrs. Suruja Yogesh Bobade</h3>
                <p class="text-[#FE5D37] font-bold mb-4">Secretary</p>
            </div>
            <!-- Principal -->
            <div class="text-center group kider-card p-6 rounded-3xl">
                <div class="relative w-64 h-64 mx-auto rounded-blob overflow-hidden mb-6 border-[10px] border-[#FFF5F3] group-hover:border-[#FE5D37] transition-colors duration-300">
                    <img src="{{ page_image('home.principal') }}" class="w-full h-full object-cover" alt="{{ page_image_alt('home.principal') }}">
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-1">Shahida Aslam Pathan</h3>
                <p class="text-[#FE5D37] font-bold mb-4">Principal</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if(typeof Swiper !== 'undefined') {
            const heroSwiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'slide',
                speed: 1000,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                }
            });
        }
    });
</script>
@endpush
