<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                {{ __('Manage Sliders') }}
            </h2>
            <a href="{{ route('admin.sliders.create') }}" class="bg-[#FE5D37] hover:bg-orange-600 text-white font-medium py-2.5 px-5 rounded-xl shadow-md transition-colors flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Add New Slider
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-xl shadow-sm mb-6 flex items-center" role="alert">
            <i class="fa-solid fa-circle-check text-xl mr-3"></i>
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl">
        <div class="p-6 text-gray-900 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5 rounded-tl-xl">Image</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Title / Subtitle</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Status</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Order</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5 rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($sliders as $slider)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="p-5 align-middle">
                            <div class="relative w-32 h-20 rounded-xl overflow-hidden shadow-sm">
                                <img src="{{ Str::startsWith($slider->image_path, 'http') ? $slider->image_path : asset($slider->image_path) }}" alt="{{ $slider->title }}" class="absolute inset-0 w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="p-5 align-middle">
                            <div class="font-bold text-[#103741] text-lg">{{ $slider->title ?: '(No Title)' }}</div>
                            <div class="text-sm text-gray-500 mt-1 max-w-xs truncate" title="{{ $slider->subtitle }}">{{ $slider->subtitle ?: '-' }}</div>
                        </td>
                        <td class="p-5 align-middle">
                            @if($slider->is_active)
                                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium inline-flex items-center"><span class="w-2 h-2 rounded-full bg-green-500 mr-1.5"></span> Active</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-medium inline-flex items-center"><span class="w-2 h-2 rounded-full bg-red-500 mr-1.5"></span> Inactive</span>
                            @endif
                        </td>
                        <td class="p-5 align-middle font-medium text-gray-700">
                            {{ $slider->sort_order }}
                        </td>
                        <td class="p-5 align-middle">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 w-8 h-8 rounded-lg flex items-center justify-center transition-colors" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-8 h-8 rounded-lg flex items-center justify-center transition-colors" onclick="return confirm('Are you sure you want to delete this slider?')" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if($sliders->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center p-8 text-gray-500">
                            <div class="flex flex-col items-center justify-center py-6">
                                <i class="fa-solid fa-images text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg font-medium text-gray-600">No sliders found.</p>
                                <p class="text-sm mt-1">Click "Add New Slider" to create your first one.</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
