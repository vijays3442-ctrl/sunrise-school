<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                {{ __('Manage Leadership Messages (About Page)') }}
            </h2>
            <a href="{{ route('admin.leadership.create') }}" class="bg-[#FE5D37] hover:bg-orange-600 text-white font-medium py-2.5 px-5 rounded-xl shadow-md transition-colors flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Add New Leader
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
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5 rounded-tl-xl">Photo</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Name & Role</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Message Preview</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Status</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5">Order</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-5 rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($leaders as $leader)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="p-5 align-middle">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden shadow-sm border-2 border-orange-100 bg-gray-50 flex items-center justify-center">
                                @if($leader->photo_path)
                                    <img src="{{ Str::startsWith($leader->photo_path, 'http') ? $leader->photo_path : asset($leader->photo_path) }}" alt="{{ $leader->name }}" class="w-full h-full object-cover" style="object-position: center 10%;">
                                @else
                                    <i class="fa-solid fa-user text-2xl text-gray-400"></i>
                                @endif
                            </div>
                        </td>
                        <td class="p-5 align-middle">
                            <div class="font-bold text-[#103741] text-lg">{{ $leader->name }}</div>
                            <div class="inline-flex items-center text-xs font-semibold px-2.5 py-0.5 rounded-full bg-orange-100 text-[#FE5D37] mt-1">
                                {{ $leader->designation }}
                            </div>
                            @if($leader->qualification)
                                <div class="text-xs text-gray-400 mt-1">{{ $leader->qualification }}</div>
                            @endif
                        </td>
                        <td class="p-5 align-middle max-w-md">
                            <p class="text-sm text-gray-600 line-clamp-2 italic">
                                "{{ $leader->message }}"
                            </p>
                        </td>
                        <td class="p-5 align-middle">
                            @if($leader->is_active)
                                <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium inline-flex items-center"><span class="w-2 h-2 rounded-full bg-green-500 mr-1.5"></span> Active</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-medium inline-flex items-center"><span class="w-2 h-2 rounded-full bg-red-500 mr-1.5"></span> Inactive</span>
                            @endif
                        </td>
                        <td class="p-5 align-middle font-medium text-gray-700">
                            {{ $leader->sort_order }}
                        </td>
                        <td class="p-5 align-middle">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.leadership.edit', $leader->id) }}" class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 w-9 h-9 rounded-xl flex items-center justify-center transition-colors" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.leadership.destroy', $leader->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this leadership message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-9 h-9 rounded-xl flex items-center justify-center transition-colors" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">
                            <i class="fa-solid fa-users text-4xl mb-3 text-gray-300 block"></i>
                            No leadership messages found. Click "Add New Leader" to create one.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
