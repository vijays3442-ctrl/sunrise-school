<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                    {{ __('Manage Gallery') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Upload and manage school photos and videos displayed on the website.</p>
            </div>
            <a href="{{ route('gallery') }}" target="_blank" class="inline-flex items-center text-sm font-semibold text-[#FE5D37] hover:text-orange-600 bg-orange-50 hover:bg-orange-100 px-4 py-2 rounded-xl transition-colors">
                <i class="fa-solid fa-arrow-up-right-from-square mr-2"></i> View Public Gallery
            </a>
        </div>
    </x-slot>

    <!-- Session Feedback -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-2xl shadow-sm mb-6 flex items-center justify-between" role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check text-2xl text-green-500 mr-3"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-2xl shadow-sm mb-6 flex items-center justify-between" role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-exclamation text-2xl text-red-500 mr-3"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-2xl shadow-sm mb-6" role="alert">
            <div class="flex items-center mb-2">
                <i class="fa-solid fa-triangle-exclamation text-2xl text-red-500 mr-3"></i>
                <span class="font-bold text-base">Please fix the following issues:</span>
            </div>
            <ul class="list-disc list-inside text-sm space-y-1 pl-9 text-red-700">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div x-data="{
        activeTab: '{{ old('type', 'photo') }}',
        videoSource: '{{ old('video_source', 'url') }}',
        ytUrl: '{{ old('video_url', '') }}',
        photoName: '',
        videoFileName: '',
        filterType: 'all',
        previewModal: false,
        previewTitle: '',
        previewType: '',
        previewSrc: '',
        getYoutubeId(url) {
            if (!url) return null;
            const regExp = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?|shorts)\/|.*[?&]v=)|youtu\.be\/)([^&?/\s]{11})/;
            const match = url.match(regExp);
            return (match && match[1]) ? match[1] : null;
        },
        openPreview(title, type, src) {
            this.previewTitle = title;
            this.previewType = type;
            this.previewSrc = src;
            this.previewModal = true;
        },
        closePreview() {
            this.previewModal = false;
            this.previewSrc = '';
        }
    }" class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- Left: Upload Card -->
        <div class="lg:col-span-5">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 rounded-3xl sticky top-24">
                <div class="p-6">
                    <!-- Tab Switcher -->
                    <div class="flex items-center p-1.5 bg-gray-100 rounded-2xl mb-6">
                        <button 
                            type="button"
                            @click="activeTab = 'photo'"
                            :class="activeTab === 'photo' ? 'bg-white text-[#103741] shadow-sm font-bold' : 'text-gray-600 hover:text-gray-900 font-medium'"
                            class="flex-1 py-2.5 px-4 rounded-xl text-sm transition-all duration-200 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-camera text-[#FE5D37]"></i>
                            <span>Upload Photo</span>
                        </button>
                        <button 
                            type="button"
                            @click="activeTab = 'video'"
                            :class="activeTab === 'video' ? 'bg-white text-[#103741] shadow-sm font-bold' : 'text-gray-600 hover:text-gray-900 font-medium'"
                            class="flex-1 py-2.5 px-4 rounded-xl text-sm transition-all duration-200 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-video text-[#FE5D37]"></i>
                            <span>Add Video</span>
                        </button>
                    </div>

                    <!-- Upload Form -->
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        <input type="hidden" name="type" :value="activeTab">

                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="title">
                                <span x-text="activeTab === 'photo' ? 'Photo Title / Event Name' : 'Video Title / Activity Name'"></span>
                                <span class="text-red-500">*</span>
                            </label>
                            <input 
                                class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" 
                                id="title" 
                                type="text" 
                                name="title" 
                                value="{{ old('title') }}" 
                                required 
                                placeholder="e.g. Annual Sports Day 2026">
                            @error('title') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="category">Category (Optional)</label>
                            <input 
                                class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" 
                                id="category" 
                                type="text" 
                                name="category" 
                                value="{{ old('category') }}" 
                                placeholder="e.g. Sports, Cultural, Campus, Celebrations">
                            <p class="text-xs text-gray-400 mt-1">Used for filtering items on the public gallery page.</p>
                            @error('category') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <!-- PHOTO TAB FIELDS -->
                        <div x-show="activeTab === 'photo'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <label class="block text-sm font-bold text-[#103741] mb-2">
                                Photo Image <span class="text-red-500">*</span>
                            </label>
                            <div class="relative border-2 border-dashed border-gray-200 hover:border-[#FE5D37] rounded-2xl p-6 text-center bg-gray-50/70 transition-colors cursor-pointer group">
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="image" 
                                    accept="image/jpeg,image/png,image/webp,image/jpg,image/gif"
                                    @change="photoName = $event.target.files[0] ? $event.target.files[0].name : ''"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    :required="activeTab === 'photo'">
                                <div class="space-y-2">
                                    <div class="w-12 h-12 rounded-full bg-orange-100 text-[#FE5D37] flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-700">
                                            <span class="text-[#FE5D37] underline">Click to choose photo</span> or drag here
                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5">JPG, PNG, WebP up to 25MB</p>
                                    </div>
                                    <template x-if="photoName">
                                        <div class="pt-2 text-xs font-semibold text-green-600 flex items-center justify-center">
                                            <i class="fa-solid fa-check-circle mr-1"></i>
                                            <span x-text="photoName" class="truncate max-w-[220px]"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            @error('image') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <!-- VIDEO TAB FIELDS -->
                        <div x-show="activeTab === 'video'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="space-y-4">
                            <!-- Video Source Options -->
                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2">Video Source</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label 
                                        @click="videoSource = 'url'"
                                        :class="videoSource === 'url' ? 'border-[#FE5D37] bg-orange-50/50 text-[#FE5D37]' : 'border-gray-200 bg-white text-gray-600'"
                                        class="flex items-center p-3 border rounded-xl cursor-pointer hover:border-gray-300 transition-colors">
                                        <input type="radio" name="video_source" value="url" x-model="videoSource" class="text-[#FE5D37] focus:ring-[#FE5D37]">
                                        <span class="ml-2 text-xs font-semibold">YouTube URL</span>
                                    </label>
                                    <label 
                                        @click="videoSource = 'file'"
                                        :class="videoSource === 'file' ? 'border-[#FE5D37] bg-orange-50/50 text-[#FE5D37]' : 'border-gray-200 bg-white text-gray-600'"
                                        class="flex items-center p-3 border rounded-xl cursor-pointer hover:border-gray-300 transition-colors">
                                        <input type="radio" name="video_source" value="file" x-model="videoSource" class="text-[#FE5D37] focus:ring-[#FE5D37]">
                                        <span class="ml-2 text-xs font-semibold">Upload File (MP4)</span>
                                    </label>
                                </div>
                            </div>

                            <!-- YouTube URL Input -->
                            <div x-show="videoSource === 'url'">
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="video_url">
                                    YouTube Video Link <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-red-500">
                                        <i class="fa-brands fa-youtube text-lg"></i>
                                    </div>
                                    <input 
                                        class="w-full pl-10 rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm text-sm" 
                                        id="video_url" 
                                        type="url" 
                                        name="video_url" 
                                        x-model="ytUrl"
                                        placeholder="https://www.youtube.com/watch?v=..."
                                        :required="activeTab === 'video' && videoSource === 'url'">
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Supports standard watch links, youtu.be, and Shorts.</p>

                                <!-- YouTube Thumbnail Live Preview -->
                                <template x-if="getYoutubeId(ytUrl)">
                                    <div class="mt-3 p-3 bg-gray-50 rounded-xl border border-gray-200 flex items-center gap-3">
                                        <img :src="'https://img.youtube.com/vi/' + getYoutubeId(ytUrl) + '/hqdefault.jpg'" class="w-20 h-14 object-cover rounded-lg shadow-sm" alt="Preview">
                                        <div class="text-xs text-gray-600 flex-1">
                                            <p class="font-semibold text-green-600 flex items-center">
                                                <i class="fa-solid fa-circle-check mr-1"></i> Valid YouTube video!
                                            </p>
                                            <p class="text-gray-400 mt-0.5">Thumbnail will be automatically fetched.</p>
                                        </div>
                                    </div>
                                </template>
                                @error('video_url') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>

                            <!-- Direct Video File Upload -->
                            <div x-show="videoSource === 'file'">
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="video_file">
                                    Video File (MP4/WebM) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative border-2 border-dashed border-gray-200 hover:border-[#FE5D37] rounded-2xl p-5 text-center bg-gray-50/70 transition-colors cursor-pointer group">
                                    <input 
                                        type="file" 
                                        name="video_file" 
                                        id="video_file" 
                                        accept="video/mp4,video/webm,video/ogg,video/quicktime"
                                        @change="videoFileName = $event.target.files[0] ? $event.target.files[0].name : ''"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        :required="activeTab === 'video' && videoSource === 'file'">
                                    <div class="space-y-1">
                                        <div class="w-10 h-10 rounded-full bg-red-100 text-red-500 flex items-center justify-center mx-auto group-hover:scale-110 transition-transform">
                                            <i class="fa-solid fa-film text-lg"></i>
                                        </div>
                                        <p class="text-xs font-semibold text-gray-700">
                                            <span class="text-[#FE5D37] underline">Select MP4/WebM</span> or drag here
                                        </p>
                                        <p class="text-[11px] text-gray-400">Max size 64MB</p>
                                        <template x-if="videoFileName">
                                            <div class="pt-2 text-xs font-semibold text-green-600 flex items-center justify-center">
                                                <i class="fa-solid fa-check-circle mr-1"></i>
                                                <span x-text="videoFileName" class="truncate max-w-[200px]"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                @error('video_file') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>

                            <!-- Optional Custom Thumbnail for Video -->
                            <div class="pt-2 border-t border-gray-100">
                                <label class="block text-xs font-bold text-gray-600 mb-1" for="thumbnail">
                                    Custom Cover Poster (Optional)
                                </label>
                                <input 
                                    type="file" 
                                    name="thumbnail" 
                                    id="thumbnail" 
                                    accept="image/jpeg,image/png,image/webp"
                                    class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                                <p class="text-[11px] text-gray-400 mt-1">If empty for YouTube videos, the YouTube thumbnail will be used.</p>
                                @error('thumbnail') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-3">
                            <button 
                                class="w-full bg-[#FE5D37] hover:bg-orange-600 text-white font-semibold py-3.5 px-4 rounded-2xl shadow-md shadow-orange-500/20 hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2 group" 
                                type="submit">
                                <i :class="activeTab === 'photo' ? 'fa-cloud-arrow-up' : 'fa-circle-play'" class="fa-solid transition-transform group-hover:scale-110"></i>
                                <span x-text="activeTab === 'photo' ? 'Upload Photo to Gallery' : 'Save Video to Gallery'"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right: Current Gallery List -->
        <div class="lg:col-span-7">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 rounded-3xl">
                <div class="p-6">
                    <!-- Header with Filter Tabs -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 border-b border-gray-100 pb-4">
                        <div class="flex items-center gap-2">
                            <h3 class="text-xl font-bold text-[#103741] flex items-center">
                                <i class="fa-solid fa-photo-film mr-2 text-[#FE5D37]"></i> Current Gallery
                            </h3>
                            <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-full font-bold">
                                {{ $galleries->count() }} items
                            </span>
                        </div>

                        <!-- Type Filter Pills -->
                        <div class="flex items-center gap-1.5 bg-gray-100 p-1 rounded-xl text-xs font-semibold">
                            <button 
                                type="button"
                                @click="filterType = 'all'" 
                                :class="filterType === 'all' ? 'bg-white text-[#103741] shadow-xs' : 'text-gray-500 hover:text-gray-900'"
                                class="px-3 py-1.5 rounded-lg transition-all">
                                All ({{ $galleries->count() }})
                            </button>
                            <button 
                                type="button"
                                @click="filterType = 'photo'" 
                                :class="filterType === 'photo' ? 'bg-white text-[#103741] shadow-xs' : 'text-gray-500 hover:text-gray-900'"
                                class="px-3 py-1.5 rounded-lg transition-all">
                                <i class="fa-solid fa-image text-blue-500 mr-1"></i> Photos ({{ $galleries->where('type', '!=', 'video')->count() }})
                            </button>
                            <button 
                                type="button"
                                @click="filterType = 'video'" 
                                :class="filterType === 'video' ? 'bg-white text-[#103741] shadow-xs' : 'text-gray-500 hover:text-gray-900'"
                                class="px-3 py-1.5 rounded-lg transition-all">
                                <i class="fa-solid fa-video text-red-500 mr-1"></i> Videos ({{ $galleries->where('type', 'video')->count() }})
                            </button>
                        </div>
                    </div>

                    <!-- Items Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                        @forelse($galleries as $gallery)
                            <div 
                                x-show="filterType === 'all' || filterType === '{{ $gallery->is_video ? 'video' : 'photo' }}'"
                                x-transition
                                class="border border-gray-100 rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition-all duration-300 group relative bg-gray-50 flex flex-col">
                                
                                <!-- Thumbnail / Media Preview -->
                                <div class="h-44 overflow-hidden relative bg-black/5">
                                    <img 
                                        src="{{ $gallery->thumbnail_url }}" 
                                        alt="{{ $gallery->title }}" 
                                        class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                                    
                                    <!-- Badges -->
                                    <div class="absolute top-2.5 left-2.5 z-10 flex items-center gap-1.5">
                                        @if($gallery->is_video)
                                            <span class="bg-red-600/90 text-white text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center shadow-sm backdrop-blur-xs">
                                                <i class="fa-solid fa-play text-[9px] mr-1"></i> Video
                                            </span>
                                            @if($gallery->is_youtube)
                                                <span class="bg-black/60 text-white text-[10px] font-medium px-1.5 py-0.5 rounded-md backdrop-blur-xs">
                                                    <i class="fa-brands fa-youtube text-red-400"></i>
                                                </span>
                                            @else
                                                <span class="bg-black/60 text-white text-[10px] font-medium px-1.5 py-0.5 rounded-md backdrop-blur-xs">
                                                    MP4
                                                </span>
                                            @endif
                                        @else
                                            <span class="bg-[#103741]/85 text-white text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center shadow-sm backdrop-blur-xs">
                                                <i class="fa-solid fa-camera text-[9px] mr-1"></i> Photo
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Video Play Overlay / Click to preview -->
                                    @if($gallery->is_video)
                                        <button 
                                            type="button"
                                            @click="openPreview('{{ addslashes($gallery->title) }}', 'video', '{{ $gallery->is_youtube ? $gallery->embed_url : $gallery->direct_video_url }}')"
                                            class="absolute inset-0 bg-black/30 group-hover:bg-black/45 flex items-center justify-center transition-colors">
                                            <div class="w-12 h-12 rounded-full bg-[#FE5D37] text-white flex items-center justify-center shadow-lg group-hover:scale-115 transition-transform">
                                                <i class="fa-solid fa-play text-base ml-0.5"></i>
                                            </div>
                                        </button>
                                    @else
                                        <button 
                                            type="button"
                                            @click="openPreview('{{ addslashes($gallery->title) }}', 'photo', '{{ asset('storage/' . $gallery->image_path) }}')"
                                            class="absolute inset-0 bg-black/0 group-hover:bg-black/25 flex items-center justify-center transition-colors opacity-0 group-hover:opacity-100">
                                            <div class="w-10 h-10 rounded-full bg-white/90 text-[#103741] flex items-center justify-center shadow-md">
                                                <i class="fa-solid fa-magnifying-glass-plus text-sm"></i>
                                            </div>
                                        </button>
                                    @endif
                                </div>

                                <!-- Info & Action Footer -->
                                <div class="p-3.5 bg-white relative flex-1 flex flex-col justify-between">
                                    <div class="pr-9">
                                        <p class="font-bold text-[#103741] text-xs line-clamp-1" title="{{ $gallery->title }}">{{ $gallery->title }}</p>
                                        <p class="text-[11px] text-gray-500 mt-0.5 font-medium flex items-center">
                                            <i class="fa-solid fa-tag text-[9px] text-[#FE5D37] mr-1"></i>
                                            {{ $gallery->category ?? 'General' }}
                                        </p>
                                    </div>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this {{ $gallery->is_video ? 'video' : 'photo' }}?');" class="absolute right-3 top-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-7 h-7 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors" title="Delete Item">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-16 text-center text-gray-500 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                <div class="w-16 h-16 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto mb-3">
                                    <i class="fa-solid fa-photo-film text-2xl"></i>
                                </div>
                                <p class="text-base font-bold text-gray-700">No items uploaded yet.</p>
                                <p class="text-xs text-gray-400 mt-1 max-w-sm mx-auto">Use the form on the left to upload school photos or add video links to your gallery.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- In-Modal Quick Preview for Admin -->
        <div 
            x-show="previewModal" 
            x-cloak
            @keydown.escape.window="closePreview()"
            class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            
            <div 
                @click.away="closePreview()"
                class="bg-white rounded-3xl max-w-3xl w-full overflow-hidden shadow-2xl relative border border-white/10"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100">
                
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50">
                    <h4 class="font-bold text-[#103741] text-base truncate pr-4" x-text="previewTitle"></h4>
                    <button @click="closePreview()" class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 hover:bg-[#FE5D37] hover:text-white flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-4 bg-black flex items-center justify-center min-h-[350px]">
                    <!-- If Video with YouTube / Iframe -->
                    <template x-if="previewType === 'video' && previewSrc.includes('embed')">
                        <div class="w-full aspect-video">
                            <iframe 
                                :src="previewSrc" 
                                class="w-full h-full rounded-xl" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    </template>

                    <!-- If Direct MP4 Video -->
                    <template x-if="previewType === 'video' && !previewSrc.includes('embed')">
                        <video :src="previewSrc" controls autoplay class="max-h-[70vh] w-full rounded-xl"></video>
                    </template>

                    <!-- If Photo -->
                    <template x-if="previewType === 'photo'">
                        <img :src="previewSrc" class="max-h-[75vh] w-auto mx-auto rounded-xl object-contain" alt="Photo Preview">
                    </template>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>