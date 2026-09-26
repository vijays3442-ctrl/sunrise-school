@extends('layouts.public')

@section('title', $page['title'].' - Sunrise English Medium School')

@section('content')
<header class="relative isolate overflow-hidden bg-[#103741] py-20 lg:py-28">
    <div class="absolute inset-0 -z-10 bg-cover bg-center opacity-25" style="background-image: url('{{ page_image("content.{$sectionKey}.{$slug}") }}')"></div>
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-[#103741] via-[#103741]/90 to-[#103741]/45"></div>
    <div class="container mx-auto px-4 lg:px-8">
        <nav class="mb-8 flex flex-wrap items-center gap-2 text-sm text-white/75" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <a href="{{ route('site.section', ['section' => $sectionKey]) }}" class="hover:text-white">{{ $section['label'] }}</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span class="text-orange-200">{{ $page['title'] }}</span>
        </nav>

        <div class="max-w-4xl">
            @if(!empty($page['group']))
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-orange-200">{{ $page['group'] }}</p>
            @else
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-orange-200">{{ $section['label'] }}</p>
            @endif
            <h1 class="font-lobster text-5xl font-bold leading-tight text-white md:text-6xl">{{ $page['title'] }}</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-white/85">{{ $page['summary'] }}</p>
        </div>
    </div>
</header>

<main class="bg-[#FFF5F3] py-14 lg:py-20">
    <div class="container mx-auto grid grid-cols-1 gap-10 px-4 lg:grid-cols-[280px_minmax(0,1fr)] lg:px-8">
        <aside class="self-start lg:sticky lg:top-28">
            <div class="overflow-hidden rounded-3xl bg-[#103741] shadow-lg">
                <a href="{{ route('site.section', ['section' => $sectionKey]) }}" class="block border-b border-white/10 px-6 py-5 font-lobster text-2xl text-white">
                    {{ $section['label'] }}
                </a>
                <nav class="p-3" aria-label="{{ $section['label'] }} pages">
                    @foreach($section['pages'] as $siblingSlug => $sibling)
                        <a href="{{ route('site.page', ['section' => $sectionKey, 'slug' => $siblingSlug]) }}" class="mb-1 flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition {{ $siblingSlug === $slug ? 'bg-[#FE5D37] text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <span>{{ $sibling['title'] }}</span>
                            @if($siblingSlug === $slug)<i class="fa-solid fa-arrow-right text-xs"></i>@endif
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <article class="min-w-0">
            <section class="rounded-3xl border border-gray-100 bg-white p-7 shadow-sm md:p-10">
                <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-[#FFF5F3] text-2xl text-[#FE5D37]">
                    <i class="fa-solid {{ $page['icon'] }}"></i>
                </div>
                <h2 class="font-lobster text-3xl text-[#103741]">About {{ $page['title'] }}</h2>
                <p class="mt-5 text-lg leading-8 text-gray-600">{{ $page['intro'] }}</p>
            </section>

            @if(!empty($page['details']))
                <section class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach($page['details'] as $label => $value)
                        <div class="rounded-2xl border border-orange-100 bg-white p-6 shadow-sm">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#FE5D37]">{{ $label }}</p>
                            <p class="mt-2 font-semibold leading-relaxed text-[#103741]">{{ $value }}</p>
                        </div>
                    @endforeach
                </section>
            @endif

            @if(!empty($page['highlights']))
                <section class="mt-8 rounded-3xl border border-gray-100 bg-white p-7 shadow-sm md:p-10">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#FE5D37]">Key highlights</p>
                    <h2 class="mt-2 font-lobster text-3xl text-[#103741]">What families can expect</h2>
                    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2">
                        @foreach($page['highlights'] as $title => $description)
                            <div class="flex gap-4">
                                <div class="mt-1 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#FE5D37] text-sm text-white">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-[#103741]">{{ $title }}</h3>
                                    <p class="mt-1 leading-relaxed text-gray-600">{{ $description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            @if($records->isNotEmpty())
                <section class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2">
                    @foreach($records as $record)
                        <div class="rounded-3xl border border-gray-100 bg-white p-7 shadow-sm">
                            <span class="inline-flex rounded-full bg-[#FFF5F3] px-3 py-1 text-sm font-bold text-[#FE5D37]">{{ $record->rank_percentage ?: 'Achievement' }}</span>
                            <h3 class="mt-4 text-xl font-bold text-[#103741]">{{ $record->name }}</h3>
                            <p class="mt-2 text-gray-600">{{ $record->title }}</p>
                        </div>
                    @endforeach
                </section>
            @endif

            @if($page['note'])
                <div class="mt-8 rounded-2xl border-l-4 border-[#FE5D37] bg-orange-50 p-6 text-gray-700">
                    <div class="flex gap-3">
                        <i class="fa-solid fa-circle-info mt-1 text-[#FE5D37]"></i>
                        <p class="leading-relaxed">{{ $page['note'] }}</p>
                    </div>
                </div>
            @endif

            <section class="mt-8 overflow-hidden rounded-3xl bg-[#103741] p-8 text-white shadow-lg md:flex md:items-center md:justify-between md:p-10">
                <div>
                    <h2 class="font-lobster text-3xl">Need more information?</h2>
                    <p class="mt-2 max-w-2xl text-white/75">Our school team can help with current programme details, availability and next steps.</p>
                </div>
                <a href="{{ route('contact') }}" class="mt-6 inline-flex shrink-0 items-center gap-2 rounded-full bg-[#FE5D37] px-6 py-3 font-bold text-white transition hover:bg-orange-600 md:ml-8 md:mt-0">
                    Contact Us <i class="fa-solid fa-arrow-right"></i>
                </a>
            </section>
        </article>
    </div>
</main>
@endsection
