<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                {{ __('Edit Slider') }}
            </h2>
            <a href="{{ route('admin.sliders.index') }}" class="text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 font-medium py-2 px-4 rounded-xl shadow-sm transition-colors flex items-center text-sm">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Sliders
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl max-w-4xl">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="title">Headline Title</label>
                                <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="title" type="text" name="title" value="{{ old('title', $slider->title) }}" placeholder="e.g. The Best Educational Start For Your Child">
                                @error('title') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="subtitle">Subtitle / Paragraph</label>
                                <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="subtitle" type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}" placeholder="e.g. State-of-the-art facilities designed to foster creativity...">
                                @error('subtitle') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2">Current Image</label>
                                <div class="mb-4 relative w-64 h-36 rounded-xl overflow-hidden shadow-md">
                                    <img src="{{ asset($slider->image_path) }}" alt="Current image" class="absolute inset-0 w-full h-full object-cover">
                                </div>
                                
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="image">Replace Image (Leave empty to keep current)</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#FE5D37] transition-colors bg-gray-50 relative group">
                                    <div class="space-y-1 text-center">
                                        <i class="fa-solid fa-cloud-arrow-up text-4xl text-gray-400 group-hover:text-[#FE5D37] transition-colors mb-3"></i>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="image" class="relative cursor-pointer rounded-md bg-transparent font-medium text-[#FE5D37] hover:text-orange-500 focus-within:outline-none">
                                                <span>Upload a new file</span>
                                                <input id="image" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB. Recommended 1920x1080px.</p>
                                    </div>
                                </div>
                                @error('image') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-[#103741] mb-2" for="button_text">Button Text (Optional)</label>
                                    <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="button_text" type="text" name="button_text" value="{{ old('button_text', $slider->button_text) }}" placeholder="e.g. Learn More">
                                    @error('button_text') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-[#103741] mb-2" for="button_link">Button Link (Optional)</label>
                                    <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="button_link" type="text" name="button_link" value="{{ old('button_link', $slider->button_link) }}" placeholder="e.g. /about">
                                    @error('button_link') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                                <div>
                                    <label class="block text-sm font-bold text-[#103741] mb-2" for="sort_order">Display Order</label>
                                    <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $slider->sort_order) }}">
                                </div>
                                <div class="flex items-center pt-8">
                                    <div class="relative flex items-start">
                                        <div class="flex h-6 items-center">
                                            <input type="checkbox" id="is_active" name="is_active" value="1" class="h-5 w-5 rounded border-gray-300 text-[#FE5D37] focus:ring-[#FE5D37]" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                                        </div>
                                        <div class="ml-3 text-sm leading-6">
                                            <label for="is_active" class="font-bold text-[#103741]">Active Status</label>
                                            <p class="text-gray-500 text-xs">If unchecked, this slide will be hidden from the homepage.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 space-x-4">
                            <a href="{{ route('admin.sliders.index') }}" class="text-gray-600 hover:text-gray-900 font-medium py-2.5 px-5">
                                Cancel
                            </a>
                            <button class="bg-[#FE5D37] hover:bg-orange-600 text-white font-medium py-2.5 px-8 rounded-xl shadow-md transition-colors flex items-center" type="submit">
                                <i class="fa-solid fa-save mr-2"></i> Update Slider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
