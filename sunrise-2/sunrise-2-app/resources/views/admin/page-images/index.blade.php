<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">Page Images</h2>
            <p class="mt-1 text-sm text-gray-500">Replace any fixed page image. Resetting a slot restores the original image shown before this manager was added.</p>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 rounded-xl border-l-4 border-green-500 bg-green-50 px-6 py-4 text-green-700" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-xl border-l-4 border-red-500 bg-red-50 px-6 py-4 text-red-700" role="alert">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="space-y-10">
        @foreach($images as $page => $pageImages)
            <section>
                <div class="mb-5 flex items-center gap-3">
                    <h3 class="text-2xl font-bold font-lobster text-[#103741]">{{ $page }}</h3>
                    <span class="rounded-full bg-[#FFF5F3] px-3 py-1 text-xs font-bold text-[#FE5D37]">{{ $pageImages->count() }} images</span>
                </div>

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
                    @foreach($pageImages as $pageImage)
                        <article class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">
                            <div class="grid md:grid-cols-[220px_1fr]">
                                <div class="relative min-h-52 bg-gray-100">
                                    <img src="{{ page_image($pageImage->key) }}" alt="{{ $pageImage->alt_text }}" class="absolute inset-0 h-full w-full object-cover">
                                    <span class="absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-bold text-white {{ $pageImage->image_path ? 'bg-green-600' : 'bg-[#103741]' }}">
                                        {{ $pageImage->image_path ? 'Custom' : 'Fallback' }}
                                    </span>
                                </div>

                                <div class="p-6">
                                    <p class="text-xs font-bold uppercase tracking-wider text-[#FE5D37]">{{ $pageImage->section }}</p>
                                    <h4 class="mt-1 text-xl font-bold text-[#103741]">{{ $pageImage->label }}</h4>
                                    <code class="mt-2 block break-all text-xs text-gray-400">{{ $pageImage->key }}</code>

                                    <form action="{{ route('admin.page-images.update', $pageImage) }}" method="POST" enctype="multipart/form-data" class="mt-5 space-y-3">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label for="image-{{ $pageImage->id }}" class="mb-1 block text-sm font-semibold text-gray-700">New image</label>
                                            <input id="image-{{ $pageImage->id }}" name="image" type="file" accept="image/jpeg,image/png,image/gif,image/webp" required class="block w-full rounded-lg border border-gray-200 p-2 text-sm">
                                        </div>
                                        <div>
                                            <label for="alt-{{ $pageImage->id }}" class="mb-1 block text-sm font-semibold text-gray-700">Alternative text</label>
                                            <input id="alt-{{ $pageImage->id }}" name="alt_text" type="text" value="{{ $pageImage->alt_text }}" maxlength="255" class="block w-full rounded-lg border-gray-200 text-sm">
                                        </div>
                                        <button type="submit" class="rounded-xl bg-[#FE5D37] px-4 py-2 text-sm font-bold text-white transition hover:bg-orange-600">
                                            Upload replacement
                                        </button>
                                    </form>

                                    @if($pageImage->image_path)
                                        <form action="{{ route('admin.page-images.reset', $pageImage) }}" method="POST" class="mt-3" onsubmit="return confirm('Restore the original fallback image?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-800">Restore original fallback</button>
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
