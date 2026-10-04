<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                {{ __('Add New Hero Slider') }}
            </h2>
            <a href="{{ route('admin.sliders.index') }}" class="text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 font-medium py-2.5 px-4 rounded-xl shadow-sm transition-colors flex items-center text-sm">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Sliders
            </a>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6">

        <!-- 💡 Admin Image Size & Composition Guidelines Card -->
        <div class="bg-gradient-to-r from-orange-50/80 via-white to-orange-50/50 border-2 border-orange-200 rounded-3xl p-6 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#FE5D37] text-white flex items-center justify-center shrink-0 shadow-md">
                    <i class="fa-solid fa-images text-xl"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-[#103741] flex items-center gap-2">
                        <span>Best Upload Guidelines For Hero Slider</span>
                        <span class="bg-orange-100 text-[#FE5D37] text-xs font-semibold px-2.5 py-0.5 rounded-full">Important</span>
                    </h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Hero slider pure computer aur mobile screen par stretch hota hai. Photo clean aur sharp dikhne ke liye neeche diye gaye dimensions follow karein:
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 mt-4">
                        <div class="bg-white p-4 rounded-2xl border border-orange-100 shadow-xs">
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">📐 Recommended Size</div>
                            <div class="text-lg font-bold text-[#FE5D37]">1920 × 800 px</div>
                            <div class="text-xs text-gray-500 mt-0.5">or 1920 × 1080 px (16:9 Landscape)</div>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-orange-100 shadow-xs">
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">🎯 Subject Position</div>
                            <div class="text-lg font-bold text-[#103741]">Center or Right</div>
                            <div class="text-xs text-gray-500 mt-0.5">Left side has title & buttons</div>
                        </div>

                        <div class="bg-white p-4 rounded-2xl border border-orange-100 shadow-xs">
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">⚖️ File Types & Max Size</div>
                            <div class="text-lg font-bold text-[#103741]">WebP, JPG, PNG</div>
                            <div class="text-xs text-gray-500 mt-0.5">Up to 25 MB per image</div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center text-xs text-amber-800 bg-amber-50/80 border border-amber-200/80 px-4 py-2.5 rounded-xl">
                        <i class="fa-solid fa-triangle-exclamation mr-2 text-amber-600 text-sm"></i>
                        <span><strong>Tip:</strong> Phone se li gayi vertical (portrait) photo upload na karein, kyunki desktop par uski upar-neeche se cropping ho sakti hai. Hamesha horizontal (landscape) photo use karein.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Form Card -->
        <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl">
            <div class="p-8 text-gray-900">
                <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6">
                        
                        <!-- Image Upload Field with Drag-Drop and Live Preview -->
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="image">
                                Slider Background Image <span class="text-red-500">*</span>
                            </label>
                            
                            <div class="mt-1 flex justify-center px-6 pt-6 pb-6 border-2 border-gray-300 border-dashed rounded-2xl hover:border-[#FE5D37] transition-colors bg-gray-50/60 relative group cursor-pointer" onclick="document.getElementById('image').click()">
                                <div class="space-y-2 text-center">
                                    <div class="w-14 h-14 bg-orange-100 text-[#FE5D37] rounded-full flex items-center justify-center mx-auto transition-transform group-hover:scale-110">
                                        <i class="fa-solid fa-cloud-arrow-up text-2xl"></i>
                                    </div>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <span class="font-semibold text-[#FE5D37] group-hover:text-orange-600">Click to choose image</span>
                                        <span class="pl-1">or drag & drop here</span>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        Landscape format (1920 × 800 px or 1920 × 1080 px). Formats: WebP, JPG, PNG up to 25MB.
                                    </p>
                                </div>
                                <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/jpg" class="sr-only" required onchange="previewSliderImage(this)">
                            </div>
                            @error('image') <p class="text-red-500 text-xs mt-1.5"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror

                            <!-- Live Image Preview & Resolution Inspector -->
                            <div id="imagePreviewContainer" class="hidden mt-4 bg-gray-50 p-4 rounded-2xl border border-gray-200">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Live Preview & Dimension Check</span>
                                    <span id="dimensionBadge" class="text-xs font-semibold px-3 py-1 rounded-full bg-blue-100 text-blue-800">
                                        Measuring...
                                    </span>
                                </div>
                                
                                <!-- Simulated Slider Frame -->
                                <div class="relative w-full h-52 sm:h-64 rounded-xl overflow-hidden shadow-inner bg-[#103741]">
                                    <img id="imagePreview" src="#" alt="Preview" class="w-full h-full object-cover">
                                    <!-- Simulated Gradient Overlay -->
                                    <div class="absolute inset-0" style="background: linear-gradient(90deg, rgba(16, 55, 65, 0.88) 0%, rgba(16, 55, 65, 0.65) 35%, rgba(16, 55, 65, 0.18) 65%, transparent 100%);"></div>
                                    <div class="absolute inset-0 flex items-center p-6 text-white max-w-lg pointer-events-none">
                                        <div>
                                            <span class="inline-block bg-[#FE5D37] text-[10px] uppercase font-bold px-2 py-0.5 rounded-full mb-1">Preview</span>
                                            <h4 id="previewTitle" class="text-lg md:text-xl font-bold font-lobster">Headline Title Will Appear Here</h4>
                                            <p id="previewSubtitle" class="text-xs text-white/80 mt-1 line-clamp-2">Your subtitle description will appear here on top of the image with high contrast.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <p id="resolutionAdvice" class="text-xs mt-2.5 text-gray-600"></p>
                            </div>
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="title">Headline Title</label>
                            <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="title" type="text" name="title" value="{{ old('title') }}" placeholder="e.g. The Best Educational Start For Your Child" oninput="updateLiveText()">
                            <p class="text-xs text-gray-400 mt-1">Slider par main bada heading text (agar blank chhodenge to sirf photo dikhegi bina title ke).</p>
                            @error('title') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <!-- Subtitle -->
                        <div>
                            <label class="block text-sm font-bold text-[#103741] mb-2" for="subtitle">Subtitle / Supporting Description</label>
                            <textarea class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="subtitle" name="subtitle" rows="2" placeholder="e.g. State-of-the-art facilities designed to foster creativity, focus, and excellence in every student." oninput="updateLiveText()">{{ old('subtitle') }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">1-2 lines of descriptive message for parents and students.</p>
                            @error('subtitle') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                        </div>

                        <!-- Button Controls -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="button_text">Call-to-Action Button Text</label>
                                <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="button_text" type="text" name="button_text" value="{{ old('button_text', 'Apply for Admission') }}" placeholder="e.g. Apply for Admission">
                                @error('button_text') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="button_link">Button Link URL</label>
                                <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm" id="button_link" type="text" name="button_link" value="{{ old('button_link', '/admissions') }}" placeholder="e.g. /admissions or /about">
                                @error('button_link') <p class="text-red-500 text-xs mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Ordering and Visibility -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50/80 p-6 rounded-2xl border border-gray-100">
                            <div>
                                <label class="block text-sm font-bold text-[#103741] mb-2" for="sort_order">Display Order Number</label>
                                <input class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-[#FE5D37] focus:ring-opacity-20 transition-colors shadow-sm bg-white" id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
                                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first (e.g. 1, 2, 3).</p>
                            </div>
                            <div class="flex items-center pt-6">
                                <div class="relative flex items-start">
                                    <div class="flex h-6 items-center">
                                        <input type="checkbox" id="is_active" name="is_active" value="1" class="h-5 w-5 rounded border-gray-300 text-[#FE5D37] focus:ring-[#FE5D37]" {{ old('is_active', true) ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-3 text-sm leading-6">
                                        <label for="is_active" class="font-bold text-[#103741]">Active On Home Page</label>
                                        <p class="text-gray-500 text-xs">Uncheck to hide this slide from the homepage slider.</p>
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
                            <i class="fa-solid fa-save mr-2"></i> Save Slider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Client-side script for Live Image Dimension Checking & Live Preview -->
    <script>
        function previewSliderImage(input) {
            const container = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const badge = document.getElementById('dimensionBadge');
            const advice = document.getElementById('resolutionAdvice');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');

                    const img = new Image();
                    img.src = e.target.result;
                    img.onload = function() {
                        const width = this.naturalWidth;
                        const height = this.naturalHeight;
                        const ratio = (width / height).toFixed(2);

                        if (width >= 1200 && width > height) {
                            badge.className = "text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-800";
                            badge.innerHTML = `<i class="fa-solid fa-circle-check mr-1"></i> ${width} × ${height} px (${ratio}:1 Landscape) — Perfect Size!`;
                            advice.innerHTML = `<span class="text-green-700 font-medium"><i class="fa-solid fa-thumbs-up mr-1"></i> Excellent! This image has sharp resolution and proper landscape ratio for full-screen hero sliders.</span>`;
                        } else if (width < 1200 && width > height) {
                            badge.className = "text-xs font-semibold px-3 py-1 rounded-full bg-amber-100 text-amber-800";
                            badge.innerHTML = `<i class="fa-solid fa-triangle-exclamation mr-1"></i> ${width} × ${height} px — Smaller than 1920px`;
                            advice.innerHTML = `<span class="text-amber-700"><i class="fa-solid fa-circle-info mr-1"></i> Image will display, but 1920 × 800 px or higher is recommended for crystal-clear sharpness on large laptop/desktop screens.</span>`;
                        } else {
                            badge.className = "text-xs font-semibold px-3 py-1 rounded-full bg-red-100 text-red-800";
                            badge.innerHTML = `<i class="fa-solid fa-triangle-exclamation mr-1"></i> ${width} × ${height} px — Vertical / Portrait Image`;
                            advice.innerHTML = `<span class="text-red-700 font-medium"><i class="fa-solid fa-circle-exclamation mr-1"></i> Warning: Vertical/portrait images get cropped top and bottom on desktop screens. Please consider uploading a wide horizontal (landscape) photo.</span>`;
                        }
                    };
                };

                reader.readAsDataURL(file);
            }
        }

        function updateLiveText() {
            const titleInput = document.getElementById('title');
            const subInput = document.getElementById('subtitle');
            const prevTitle = document.getElementById('previewTitle');
            const prevSub = document.getElementById('previewSubtitle');

            if (titleInput && prevTitle) {
                prevTitle.textContent = titleInput.value.trim() || 'Headline Title Will Appear Here';
            }
            if (subInput && prevSub) {
                prevSub.textContent = subInput.value.trim() || 'Your subtitle description will appear here on top of the image.';
            }
        }
    </script>
</x-app-layout>
