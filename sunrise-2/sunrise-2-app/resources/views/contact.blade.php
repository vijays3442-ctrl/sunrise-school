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
            <div id="contact-form" class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-[#103741] mb-2 font-lobster">Send a Message</h3>
                <p class="text-gray-500 text-xs mb-6">Have questions or feedback? Fill in the details below and we will get back to you.</p>

                @if (session('contact_success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-2xl shadow-sm mb-6 flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-green-500 text-xl mt-0.5 shrink-0"></i>
                        <div>
                            <p class="font-bold text-sm">Message Sent Successfully!</p>
                            <p class="text-xs mt-0.5 text-green-700">{{ session('contact_success') }}</p>
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

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Name *" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('name') border-red-400 @enderror">
                        @error('name')
                            <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email *" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('email') border-red-400 @enderror">
                            @error('email')
                                <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Your Phone (Optional)"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm">
                        </div>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject *" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('subject') border-red-400 @enderror">
                        @error('subject')
                            <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <textarea name="message" rows="4" placeholder="Your Message *" required
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#FE5D37] text-sm @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-[11px] text-red-500 mt-1 pl-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-kider w-full py-4 text-base font-bold shadow-lg hover:shadow-xl transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Send Message</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
