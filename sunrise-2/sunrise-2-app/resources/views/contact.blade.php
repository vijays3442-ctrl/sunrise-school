@extends('layouts.public')

@section('title', 'Contact Us - Sunrise English Medium School')

@section('content')

<!-- Page Header -->
<div class="relative bg-[#103741] py-20 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image: url('{{ page_image('contact.header') }}'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-white text-5xl md:text-6xl font-lobster font-bold mb-4">Contact Us</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">We'd love to hear from you. Get in touch with our office.</p>
    </div>
</div>

<!-- Content Section -->
<div class="py-16 bg-[#FFF5F3]">
    <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-[#103741] mb-6">Get In Touch</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-[#FFF5F3] flex items-center justify-center text-[#FE5D37] flex-shrink-0">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div class="ml-4 pt-2">
                            <h4 class="font-bold text-[#103741]">Address</h4>
                            <p class="text-gray-600">NAGORLI ROAD, TEMBHURNI,<br>SOLAPUR - 413211</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-[#FFF5F3] flex items-center justify-center text-[#FE5D37] flex-shrink-0">
                            <i class="fa-solid fa-phone text-xl"></i>
                        </div>
                        <div class="ml-4 pt-2">
                            <h4 class="font-bold text-[#103741]">Call Us</h4>
                            <p class="text-gray-600">9767644720<br>9657100909</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-[#FFF5F3] flex items-center justify-center text-[#FE5D37] flex-shrink-0">
                            <i class="fa-solid fa-envelope text-xl"></i>
                        </div>
                        <div class="ml-4 pt-2">
                            <h4 class="font-bold text-[#103741]">Email Us</h4>
                            <p class="text-gray-600">Hmsunrisegurukul@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-[#103741] mb-6">Send a Message</h3>
                <form>
                    <div class="mb-4">
                        <input type="text" placeholder="Your Name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                    </div>
                    <div class="mb-4">
                        <input type="email" placeholder="Your Email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                    </div>
                    <div class="mb-4">
                        <input type="text" placeholder="Subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]">
                    </div>
                    <div class="mb-6">
                        <textarea rows="4" placeholder="Message" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37]"></textarea>
                    </div>
                    <button type="button" class="btn-kider w-full text-center">Send Message</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
