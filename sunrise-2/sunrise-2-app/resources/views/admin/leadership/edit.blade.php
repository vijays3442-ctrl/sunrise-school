<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                {{ __('Edit Leadership Message: ') }} {{ $leader->name }}
            </h2>
            <a href="{{ route('admin.leadership.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 px-5 rounded-xl transition-colors flex items-center">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to List
            </a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl max-w-4xl mx-auto">
        <form action="{{ route('admin.leadership.update', $leader->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Role / Key -->
                <div>
                    <label for="role" class="block text-sm font-semibold text-[#103741] mb-2">Role Identifier *</label>
                    <select name="role" id="role" required class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                        <option value="chairman" {{ old('role', $leader->role) == 'chairman' ? 'selected' : '' }}>Chairman</option>
                        <option value="secretary" {{ old('role', $leader->role) == 'secretary' ? 'selected' : '' }}>Secretary</option>
                        <option value="director" {{ old('role', $leader->role) == 'director' ? 'selected' : '' }}>Director</option>
                        <option value="principal" {{ old('role', $leader->role) == 'principal' ? 'selected' : '' }}>Principal</option>
                        <option value="other" {{ old('role', $leader->role) == 'other' ? 'selected' : '' }}>Other Leader</option>
                    </select>
                    <p class="text-xs text-gray-400 mt-1">Unique identifier (e.g. chairman, secretary, director)</p>
                </div>

                <!-- Designation -->
                <div>
                    <label for="designation" class="block text-sm font-semibold text-[#103741] mb-2">Official Designation *</label>
                    <input type="text" name="designation" id="designation" value="{{ old('designation', $leader->designation) }}" placeholder="e.g. Hon. Chairman, Secretary, Academic Director" required class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                </div>

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-[#103741] mb-2">Full Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $leader->name) }}" placeholder="e.g. Mr. Aslam Pathan" required class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                </div>

                <!-- Qualification -->
                <div>
                    <label for="qualification" class="block text-sm font-semibold text-[#103741] mb-2">Qualification / Degree</label>
                    <input type="text" name="qualification" id="qualification" value="{{ old('qualification', $leader->qualification) }}" placeholder="e.g. M.A., B.Ed." class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-[#103741] mb-2">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $leader->email) }}" placeholder="e.g. chairman@sunriseschool.com" class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-semibold text-[#103741] mb-2">Phone / Contact</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $leader->phone) }}" placeholder="e.g. +91 9767644720" class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                </div>
            </div>

            <!-- Message Text -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-semibold text-[#103741] mb-2">Full Message / Speech *</label>
                <textarea name="message" id="message" rows="7" required placeholder="Enter the complete inspirational message for students, parents, and community..." class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition leading-relaxed">{{ old('message', $leader->message) }}</textarea>
            </div>

            <!-- Current Photo Preview & New Photo Upload -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 items-center bg-gray-50/50 p-6 rounded-2xl border border-gray-100">
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 rounded-2xl overflow-hidden shadow-md border-2 border-orange-200 bg-white shrink-0 flex items-center justify-center">
                        @if($leader->photo_path)
                            <img src="{{ Str::startsWith($leader->photo_path, 'http') ? $leader->photo_path : asset($leader->photo_path) }}" alt="{{ $leader->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-3xl text-gray-400"></i>
                        @endif
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Current Photo</span>
                        <span class="text-sm font-medium text-gray-700 block truncate max-w-xs">{{ $leader->photo_path ?: 'No photo uploaded' }}</span>
                    </div>
                </div>

                <div>
                    <label for="photo" class="block text-sm font-semibold text-[#103741] mb-2">Upload New Photo (Optional)</label>
                    <input type="file" name="photo" id="photo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-[#FE5D37] hover:file:bg-orange-100 transition">
                    <p class="text-xs text-gray-400 mt-1">Leave empty to keep existing photo. Max 5MB.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-semibold text-[#103741] mb-2">Display Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $leader->sort_order) }}" class="w-full rounded-xl border-gray-200 focus:border-[#FE5D37] focus:ring focus:ring-orange-200 transition">
                    <p class="text-xs text-gray-400 mt-1">Lower numbers appear first (e.g. 1 for Chairman, 2 for Secretary, 3 for Director)</p>
                </div>

                <!-- Active Toggle -->
                <div class="pt-8">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $leader->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-[#FE5D37] shadow-sm focus:ring-[#FE5D37]">
                        <span class="ml-2 text-sm font-semibold text-[#103741]">Publish / Active on About Page</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end space-x-4 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.leadership.index') }}" class="px-6 py-2.5 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium transition">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-2.5 rounded-xl bg-[#FE5D37] hover:bg-orange-600 text-white font-medium shadow-md transition flex items-center">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Leader Message
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
