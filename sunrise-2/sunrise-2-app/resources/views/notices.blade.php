@extends('layouts.public')

@section('title', 'Notice Board - Sunrise English Medium School')

@section('content')

<!-- Page Header -->
<div class="relative bg-[#103741] py-20 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image: url('{{ page_image('notices.header') }}'); background-size: cover; background-position: center;"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-white text-4xl md:text-5xl font-lobster font-bold mb-4">Notice Board</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">Latest announcements and updates from the school.</p>
    </div>
</div>

<!-- Content Section -->
<div class="py-16 bg-[#FFF5F3]">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto">
            @if($notices->count() > 0)
                <div class="grid gap-6">
                    @foreach($notices as $notice)
                        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 kider-card group hover:shadow-md transition-shadow">
                            <div class="flex flex-col sm:flex-row items-start gap-6">
                                <!-- Date Badge -->
                                <div class="bg-[#FE5D37] text-white text-center rounded-2xl p-4 min-w-[90px] shrink-0 group-hover:bg-[#103741] transition-colors">
                                    <div class="text-3xl font-bold font-lobster leading-none mb-1">{{ \Carbon\Carbon::parse($notice->date)->format('d') }}</div>
                                    <div class="text-sm font-bold uppercase tracking-wider">{{ \Carbon\Carbon::parse($notice->date)->format('M Y') }}</div>
                                </div>
                                <!-- Notice Content -->
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-3">{{ $notice->title }}</h3>
                                    <div class="prose prose-orange max-w-none text-[#74787C] leading-relaxed">
                                        {!! nl2br(e($notice->content)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-10 flex justify-center">
                    {{ $notices->links() }}
                </div>
            @else
                <div class="bg-white rounded-3xl p-12 shadow-sm border border-gray-100 text-center kider-card">
                    <div class="w-24 h-24 bg-[#FFF5F3] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fa-regular fa-bell-slash text-4xl text-[#FE5D37]"></i>
                    </div>
                    <h3 class="text-2xl font-bold font-lobster text-[#103741] mb-2">No Notices Found</h3>
                    <p class="text-[#74787C]">There are currently no active notices or announcements. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
