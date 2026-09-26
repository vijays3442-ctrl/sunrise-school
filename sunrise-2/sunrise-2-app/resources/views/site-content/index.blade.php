@extends('layouts.public')

@section('title', $section['label'].' - Sunrise English Medium School')

@section('content')
<header class="relative isolate overflow-hidden bg-[#103741] py-20 lg:py-28">
    <div class="absolute inset-0 -z-10 bg-cover bg-center opacity-25" style="background-image: url('{{ page_image("content.{$sectionKey}.overview") }}')"></div>
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-[#103741] via-[#103741]/85 to-[#103741]/50"></div>
    <div class="container mx-auto px-4 text-center lg:px-8">
        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-[#FE5D37] text-2xl text-white shadow-lg">
            <i class="fa-solid {{ $section['icon'] }}"></i>
        </div>
        <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-orange-200">Explore Sunrise</p>
        <h1 class="font-lobster text-5xl font-bold text-white md:text-6xl">{{ $section['label'] }}</h1>
        <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-white/85">{{ $section['summary'] }}</p>
    </div>
</header>

<main class="bg-[#FFF5F3] py-16 lg:py-24">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="mb-12 text-center">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#FE5D37]">Choose a topic</p>
            <h2 class="mt-3 font-lobster text-4xl text-[#103741]">Discover {{ $section['label'] }}</h2>
            <div class="mx-auto mt-5 h-1 w-24 rounded-full bg-[#FE5D37]"></div>
        </div>

        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($section['pages'] as $slug => $page)
                <a href="{{ route('site.page', ['section' => $sectionKey, 'slug' => $slug]) }}" class="group rounded-3xl border border-gray-100 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-orange-100 hover:shadow-xl">
                    <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#FFF5F3] text-xl text-[#FE5D37] transition group-hover:bg-[#FE5D37] group-hover:text-white">
                        <i class="fa-solid {{ $page['icon'] }}"></i>
                    </div>
                    @if(!empty($page['group']))
                        <p class="mb-2 text-xs font-bold uppercase tracking-wider text-[#FE5D37]">{{ $page['group'] }}</p>
                    @endif
                    <h3 class="text-xl font-bold text-[#103741]">{{ $page['title'] }}</h3>
                    <p class="mt-3 leading-relaxed text-gray-600">{{ $page['summary'] }}</p>
                    <span class="mt-5 inline-flex items-center gap-2 font-bold text-[#FE5D37]">
                        Learn more <i class="fa-solid fa-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</main>
@endsection
