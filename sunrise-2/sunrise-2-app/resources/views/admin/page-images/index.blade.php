<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                    {{ __('Website Page Images') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Manage core website images, section photos, and header banners. All images fit automatically.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="bg-[#FFF5F3] text-[#FE5D37] text-xs font-bold px-3.5 py-1.5 rounded-full border border-orange-200">
                    <i class="fa-solid fa-images mr-1"></i> {{ $images->flatten()->count() }} Essential Images
                </span>
            </div>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border-l-4 border-green-500 bg-green-50 px-6 py-4 text-green-700 shadow-sm flex items-center" role="alert">
            <i class="fa-solid fa-circle-check text-xl mr-3 text-green-600"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-2xl border-l-4 border-red-500 bg-red-50 px-6 py-4 text-red-700 shadow-sm" role="alert">
            <div class="font-bold mb-1 flex items-center">
                <i class="fa-solid fa-triangle-exclamation mr-2"></i> Please fix the errors below:
            </div>
            <ul class="list-disc pl-5 text-sm space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Category Filter Tabs -->
    <div class="mb-8 flex flex-wrap items-center gap-2 bg-white p-2 rounded-2xl shadow-xs border border-gray-100" x-data="{ activeTab: 'all' }">
        <button type="button" @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-[#FE5D37] text-white shadow-sm' : 'text-gray-600 hover:text-[#103741] hover:bg-gray-100'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
            All Images ({{ $images->flatten()->count() }})
        </button>
        @foreach($images as $page => $pageImages)
            <button type="button" @click="activeTab = '{{ Str::slug($page) }}'" :class="activeTab === '{{ Str::slug($page) }}' ? 'bg-[#FE5D37] text-white shadow-sm' : 'text-gray-600 hover:text-[#103741] hover:bg-gray-100'" class="px-4 py-2 rounded-xl text-xs font-bold transition-all">
                {{ $page }} ({{ $pageImages->count() }})
            </button>
        @endforeach
    </div>

    <div class="space-y-10" x-data="{ activeTab: 'all' }">
        @foreach($images as $page => $pageImages)
            <section x-show="activeTab === 'all' || activeTab === '{{ Str::slug($page) }}'" class="space-y-5">
                <div class="flex items-center gap-3 border-b border-gray-200/80 pb-3">
                    <div class="w-8 h-8 rounded-xl bg-orange-100 text-[#FE5D37] flex items-center justify-center text-sm font-bold shadow-xs">
                        <i class="fa-solid fa-folder-open"></i>
                    </div>
                    <h3 class="text-2xl font-bold font-lobster text-[#103741]">{{ $page }}</h3>
                    <span class="rounded-full bg-[#FFF5F3] px-3 py-1 text-xs font-bold text-[#FE5D37] border border-orange-200/50">
                        {{ $pageImages->count() }} {{ Str::plural('image', $pageImages->count()) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    @foreach($pageImages as $pageImage)
                        <article class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm hover:shadow-md transition-shadow">
                            <div class="grid md:grid-cols-[220px_1fr]">
                                <div class="relative min-h-52 bg-[#103741]/5 flex items-center justify-center p-2 overflow-hidden group">
                                    <img src="{{ page_image($pageImage->key) }}" alt="{{ $pageImage->alt_text }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <span class="absolute left-3 top-3 rounded-full px-3 py-1 text-[11px] font-bold text-white shadow-md {{ $pageImage->image_path ? 'bg-green-600' : 'bg-[#103741]' }}">
                                        <i class="fa-solid {{ $pageImage->image_path ? 'fa-check' : 'fa-image' }} mr-1"></i>
                                        {{ $pageImage->image_path ? 'Custom' : 'Original' }}
                                    </span>
                                </div>

                                <div class="p-6 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between gap-2">
                                            <p class="text-[11px] font-bold uppercase tracking-wider text-[#FE5D37] bg-orange-50 px-2.5 py-0.5 rounded-full inline-block">
                                                {{ $pageImage->section }}
                                            </p>
                                            <code class="text-[10px] text-gray-400 select-all">{{ $pageImage->key }}</code>
                                        </div>
                                        <h4 class="mt-2 text-lg font-bold text-[#103741]">{{ $pageImage->label }}</h4>
                                    </div>

                                    <form action="{{ route('admin.page-images.update', $pageImage) }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-3">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label for="image-{{ $pageImage->id }}" class="mb-1 block text-xs font-bold text-[#103741]">
                                                Choose New Image
                                            </label>
                                            <input id="image-{{ $pageImage->id }}" name="image" type="file" accept="image/jpeg,image/png,image/gif,image/webp" required class="block w-full rounded-xl border border-gray-200 p-2 text-xs bg-gray-50/50 hover:bg-white focus:bg-white transition-colors cursor-pointer">
                                        </div>
                                        <div>
                                            <label for="alt-{{ $pageImage->id }}" class="mb-1 block text-xs font-bold text-[#103741]">
                                                Alt Description
                                            </label>
                                            <input id="alt-{{ $pageImage->id }}" name="alt_text" type="text" value="{{ $pageImage->alt_text }}" maxlength="255" class="block w-full rounded-xl border-gray-200 text-xs shadow-xs focus:border-[#FE5D37] focus:ring-[#FE5D37]">
                                        </div>
                                        <div class="flex items-center gap-3 pt-1">
                                            <button type="submit" class="rounded-xl bg-[#FE5D37] hover:bg-orange-600 px-4 py-2 text-xs font-bold text-white transition-colors shadow-sm flex items-center">
                                                <i class="fa-solid fa-cloud-arrow-up mr-1.5"></i> Upload Photo
                                            </button>

                                            @if($pageImage->image_path)
                                                <button type="submit" form="reset-form-{{ $pageImage->id }}" class="text-xs font-semibold text-red-600 hover:text-red-800 transition-colors">
                                                    <i class="fa-solid fa-rotate-left mr-1"></i> Reset to Default
                                                </button>
                                            @endif
                                        </div>
                                    </form>

                                    @if($pageImage->image_path)
                                        <form id="reset-form-{{ $pageImage->id }}" action="{{ route('admin.page-images.reset', $pageImage) }}" method="POST" class="hidden" onsubmit="return confirm('Restore the original default image?');">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>
</x-app-layout>
