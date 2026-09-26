<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
            {{ __('Manage Photo Gallery') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-xl shadow-sm mb-6 flex items-center" role="alert">
            <i class="fa-solid fa-circle-check text-xl mr-3"></i>
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-xl shadow-sm mb-6 flex items-center" role="alert">
            <i class="fa-solid fa-circle-exclamation text-xl mr-3"></i>
            <span class="block sm:inline font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Upload Form Column -->
        <div class="lg:col-span-1">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl sticky top-24">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold text-[#103741] mb-6 border-b border-gray-100 pb-4">
                        <i class="fa-solid fa-cloud-arrow-up mr-2 text-[#FE5D37]"></i> Upload New Photo
                    </h3>
                    
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="title">Image Title / Event Name</label>
                            <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="title" type="text" name="title" required placeholder="e.g. Annual Sports Day 2024">
                            @error('title') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="category">Category (Optional)</label>
                            <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="category" type="text" name="category" placeholder="e.g. Sports, Academics, Culture">
                            @error('category') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="image">Image File <span class="text-red-500">*</span></label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#FE5D37] transition-colors bg-gray-50 relative group">
                                <div class="space-y-1 text-center">
                                    <i class="fa-solid fa-image text-3xl text-gray-400 group-hover:text-[#FE5D37] transition-colors mb-2"></i>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="image" class="relative cursor-pointer rounded-md bg-transparent font-medium text-[#FE5D37] hover:text-orange-500 focus-within:outline-none">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" required>
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                                </div>
                            </div>
                            @error('image') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-2">
                            <button class="w-full bg-[#FE5D37] hover:bg-orange-600 text-white font-medium py-3 px-4 rounded-xl shadow-md transition-colors flex items-center justify-center" type="submit">
                                <i class="fa-solid fa-upload mr-2"></i> Upload to Gallery
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Gallery Grid Column -->
        <div class="lg:col-span-2">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6 border-b border-gray-100 pb-4">
                        <h3 class="text-xl font-bold text-[#103741]">
                            <i class="fa-solid fa-images mr-2 text-[#FE5D37]"></i> Current Gallery
                        </h3>
                        <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full font-medium">{{ $galleries->count() }} Photos</span>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @forelse($galleries as $gallery)
                            <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow group relative bg-gray-50">
                                <div class="h-48 overflow-hidden relative">
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-4 bg-white relative">
                                    <div class="pr-8">
                                        <p class="font-bold text-[#103741] text-sm truncate" title="{{ $gallery->title }}">{{ $gallery->title }}</p>
                                        <p class="text-xs text-gray-500 mt-0.5 font-medium">{{ $gallery->category ?? 'General' }}</p>
                                    </div>
                                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');" class="absolute right-3 top-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-full bg-red-50 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors shadow-sm" title="Delete Photo">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-16 text-center text-gray-500 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                <i class="fa-solid fa-camera-retro text-5xl text-gray-300 mb-4"></i>
                                <p class="text-lg font-medium text-gray-600">No photos uploaded yet.</p>
                                <p class="text-sm mt-1">Use the form on the left to add photos to your gallery.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>