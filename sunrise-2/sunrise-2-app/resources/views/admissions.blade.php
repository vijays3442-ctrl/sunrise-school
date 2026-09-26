@extends('layouts.public')

@section('title', 'Admissions - Sunrise English Medium School')

@section('content')

<!-- Page Header -->
<div class="relative bg-[#103741] py-20 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image: url('{{ page_image('admissions.header') }}'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-white text-5xl md:text-6xl font-lobster font-bold mb-4">Admissions</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">Join the Sunrise family. Simple and transparent admission process.</p>
    </div>
</div>

<!-- Content Section -->
<div class="py-16 bg-[#FFF5F3]">
    <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
        
        <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-sm border border-gray-100 mb-12">
            <h2 class="text-3xl font-lobster text-[#103741] mb-6 border-b-2 border-[#FE5D37] pb-3 inline-block">Admission Process</h2>
            
            <div class="space-y-6 mt-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#FE5D37] text-white flex items-center justify-center font-bold text-lg mt-1">1</div>
                    <div class="ml-4">
                        <h4 class="text-xl font-bold text-[#103741]">Registration</h4>
                        <p class="text-gray-600 mt-1">Obtain the admission form from the school office or download it online. Submit the filled form before the deadline.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#FE5D37] text-white flex items-center justify-center font-bold text-lg mt-1">2</div>
                    <div class="ml-4">
                        <h4 class="text-xl font-bold text-[#103741]">Interaction / Entrance Test</h4>
                        <p class="text-gray-600 mt-1">For pre-primary, a simple interaction is conducted. For higher classes, a basic proficiency test may be required.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#FE5D37] text-white flex items-center justify-center font-bold text-lg mt-1">3</div>
                    <div class="ml-4">
                        <h4 class="text-xl font-bold text-[#103741]">Document Verification</h4>
                        <p class="text-gray-600 mt-1">Submit required documents including Birth Certificate, previous school LC/TC, and Aadhar card.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#FE5D37] text-white flex items-center justify-center font-bold text-lg mt-1">4</div>
                    <div class="ml-4">
                        <h4 class="text-xl font-bold text-[#103741]">Fee Payment</h4>
                        <p class="text-gray-600 mt-1">Confirm admission by paying the requisite fees for the term.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h3 class="text-2xl font-bold text-[#103741] mb-4">Have Questions?</h3>
            <p class="text-gray-600 mb-6">Our admission counselors are ready to help you.</p>
            <a href="{{ route('contact') }}" class="btn-kider">Contact Admissions Office</a>
        </div>

    </div>
</div>

@endsection
