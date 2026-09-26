<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                {{ __('Edit Notice') }}
            </h2>
            <a href="{{ route('admin.notices.index') }}" class="text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 font-medium py-2 px-4 rounded-xl shadow-sm transition-colors flex items-center text-sm">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Notices
            </a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl max-w-4xl">
        <div class="p-8 text-gray-900">
            <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-[#103741] mb-2" for="title">Notice Title</label>
                        <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="title" type="text" name="title" value="{{ old('title', $notice->title) }}" required>
                        @error('title') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-[#103741] mb-2" for="content">Notice Content</label>
                        <textarea class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="content" name="content" rows="4" required>{{ old('content', $notice->content) }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="date">Date</label>
                            <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="date" type="date" name="date" value="{{ old('date', $notice->date ? $notice->date->format('Y-m-d') : '') }}" required>
                            @error('date') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>
                        <div class="flex items-center pt-8">
                            <div class="relative flex items-start">
                                <div class="flex h-6 items-center">
                                    <input type="checkbox" id="is_active" name="is_active" value="1" class="h-5 w-5 rounded border-gray-300 text-[#FE5D37] focus:ring-[#FE5D37]" {{ old('is_active', $notice->is_active) ? 'checked' : '' }}>
                                </div>
                                <div class="ml-3 text-sm leading-6">
                                    <label for="is_active" class="font-bold text-[#103741]">Active Status</label>
                                    <p class="text-gray-500 text-xs">If unchecked, this notice will be hidden from the scrolling marquee.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100 space-x-4">
                    <a href="{{ route('admin.notices.index') }}" class="text-gray-600 hover:text-gray-900 font-medium py-2.5 px-5">
                        Cancel
                    </a>
                    <button class="bg-[#FE5D37] hover:bg-orange-600 text-white font-medium py-2.5 px-8 rounded-xl shadow-md transition-colors flex items-center" type="submit">
                        <i class="fa-solid fa-save mr-2"></i> Update Notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>