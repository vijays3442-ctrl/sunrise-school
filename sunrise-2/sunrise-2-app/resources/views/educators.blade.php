@extends('layouts.public')

@section('title', 'Our Educators | Sunrise English Medium School')

@section('content')

<!-- Elegant Page Header -->
<section class="relative bg-white py-24 lg:py-32 overflow-hidden mt-0">
    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-[#103741] mb-6 font-lobster" data-aos="fade-up" data-aos-delay="100">
            Our <span class="text-[#FE5D37]">Educators</span>
        </h1>
        <p class="text-xl text-[#74787C] max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            Meet the dedicated and passionate professionals who nurture, guide, and inspire our students to achieve greatness every single day.
        </p>
    </div>
</section>

<!-- Educators Grid -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-4 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @php
                $educators = [
                    ['name' => 'Mrs. Shahida Aslam Pathan', 'role' => 'Academic Director', 'image_key' => 'educators.shahida_pathan'],
                    ['name' => 'Mr. Prabhakar Benkap', 'role' => 'Head Master', 'image_key' => 'educators.prabhakar_benkap'],
                    ['name' => 'Mr. Ajay Shinde', 'role' => 'Secondary Coordinator', 'image_key' => 'educators.ajay_shinde'],
                    ['name' => 'Mr. Ajit Ghorpade', 'role' => 'Primary & LEAD Coordinator', 'image_key' => 'educators.ajit_ghorpade'],
                    ['name' => 'Ms. Supriya Kale', 'role' => 'Pre-School Coordinator', 'image_key' => 'educators.supriya_kale'],
                    ['name' => 'Mr. Ganesh Devkate', 'role' => 'Sport Teacher', 'image_key' => 'educators.ganesh_devkate'],
                    ['name' => 'Mr. Balu Ranpise', 'role' => 'Faculty Member', 'image_key' => 'educators.balu_ranpise'],
                    ['name' => 'Mr. Naushad Pathan', 'role' => 'Faculty Member', 'image_key' => 'educators.naushad_pathan'],
                    ['name' => 'Mr. Dhananjay Altekar', 'role' => 'Faculty Member', 'image_key' => 'educators.dhananjay_altekar'],
                    ['name' => 'Ms. Dipali Satav', 'role' => 'Faculty Member', 'image_key' => 'educators.dipali_satav'],
                    ['name' => 'Ms. Jyoti Ajetrao', 'role' => 'Faculty Member', 'image_key' => 'educators.jyoti_ajetrao'],
                    ['name' => 'Ms. Manjusha Nadgauda', 'role' => 'Faculty Member', 'image_key' => 'educators.manjusha_nadgauda'],
                    ['name' => 'Ms. Monali Anantwar', 'role' => 'Faculty Member', 'image_key' => 'educators.monali_anantwar'],
                    ['name' => 'Ms. Pranali Kute', 'role' => 'Faculty Member', 'image_key' => 'educators.pranali_kute'],
                    ['name' => 'Ms. Shital Tanpure', 'role' => 'Faculty Member', 'image_key' => 'educators.shital_tanpure'],
                    ['name' => 'Ms. Shruti Patil', 'role' => 'Faculty Member', 'image_key' => 'educators.shruti_patil'],
                    ['name' => 'Ms. Shubhangi Mali', 'role' => 'Faculty Member', 'image_key' => 'educators.shubhangi_mali'],
                    ['name' => 'Ms. Suvarna Swami', 'role' => 'Faculty Member', 'image_key' => 'educators.suvarna_swami'],
                ];
            @endphp

            @foreach($educators as $index => $edu)
            <div class="text-center group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="relative w-64 h-64 mx-auto rounded-full overflow-hidden mb-6 border-[10px] border-[#FFF5F3] group-hover:border-[#FE5D37] transition-colors duration-300">
                    <img src="{{ page_image($edu['image_key']) }}" alt="{{ page_image_alt($edu['image_key']) }}" class="w-full h-full object-cover" style="object-position: top;">
                </div>
                <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-1">{{ $edu['name'] }}</h3>
                <p class="text-[#FE5D37] font-bold mb-4">{{ $edu['role'] }}</p>
                
                <div class="flex justify-center space-x-2">
                    <a class="btn-kider bg-[#103741] text-white !px-3 hover:bg-[#FE5D37]" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn-kider bg-[#103741] text-white !px-3 hover:bg-[#FE5D37]" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-kider bg-[#103741] text-white !px-3 hover:bg-[#FE5D37]" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
