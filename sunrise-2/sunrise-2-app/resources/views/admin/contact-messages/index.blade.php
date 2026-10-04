<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                    {{ __('Contact Form Messages & Inquiries') }}
                </h2>
                <p class="text-xs text-gray-500 mt-1">Review and manage inquiries received through the website contact form.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-100 text-[#FE5D37]">
                    Total: {{ $counts['all'] }}
                </span>
                @if($counts['unread'] > 0)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 animate-pulse">
                        {{ $counts['unread'] }} Unread
                    </span>
                @endif
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-xl shadow-sm mb-6 flex items-center" role="alert">
            <i class="fa-solid fa-circle-check text-xl mr-3"></i>
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Status Filters -->
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('admin.contact.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ empty($status) ? 'bg-[#103741] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
            All Messages ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.contact.index', ['status' => 'unread']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'unread' ? 'bg-amber-500 text-white shadow-md' : 'bg-white text-amber-700 hover:bg-amber-50 border border-amber-200' }}">
            Unread ({{ $counts['unread'] }})
        </a>
        <a href="{{ route('admin.contact.index', ['status' => 'read']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'read' ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-blue-700 hover:bg-blue-50 border border-blue-200' }}">
            Read ({{ $counts['read'] }})
        </a>
        <a href="{{ route('admin.contact.index', ['status' => 'replied']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'replied' ? 'bg-green-600 text-white shadow-md' : 'bg-white text-green-700 hover:bg-green-50 border border-green-200' }}">
            Replied ({{ $counts['replied'] }})
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl">
        <div class="p-6 text-gray-900 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4 rounded-tl-xl">Sender</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Subject & Message</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Received</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Status</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4 rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse ($messages as $msg)
                    <tr class="hover:bg-gray-50/50 transition-colors {{ $msg->status === 'unread' ? 'bg-amber-50/30' : '' }}">
                        <td class="p-4 align-top whitespace-nowrap">
                            <div class="font-bold text-[#103741] text-base flex items-center gap-2">
                                {{ $msg->name }}
                                @if($msg->status === 'unread')
                                    <span class="w-2 h-2 rounded-full bg-amber-500" title="Unread"></span>
                                @endif
                            </div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-envelope text-gray-400"></i>
                                <a href="mailto:{{ $msg->email }}?subject=Re: {{ urlencode($msg->subject) }}" class="hover:text-[#FE5D37] underline">{{ $msg->email }}</a>
                            </div>
                            @if($msg->phone)
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-phone text-gray-400"></i>
                                <a href="tel:{{ $msg->phone }}" class="hover:text-[#FE5D37]">{{ $msg->phone }}</a>
                            </div>
                            @endif
                        </td>
                        <td class="p-4 align-top max-w-md">
                            <div class="font-semibold text-gray-800 text-sm mb-1.5">{{ $msg->subject }}</div>
                            <div class="text-gray-600 leading-relaxed text-xs bg-gray-50 p-3 rounded-xl border border-gray-100">
                                {!! nl2br(e($msg->message)) !!}
                            </div>
                            <div class="mt-2 flex items-center gap-3">
                                <a href="mailto:{{ $msg->email }}?subject=Re: {{ urlencode($msg->subject) }}" 
                                   class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#FE5D37] hover:underline">
                                    <i class="fa-solid fa-reply"></i> Reply via Email
                                </a>
                            </div>
                        </td>
                        <td class="p-4 align-top whitespace-nowrap text-xs text-gray-500">
                            <div>{{ $msg->created_at->format('M d, Y') }}</div>
                            <div class="text-gray-400 text-[11px]">{{ $msg->created_at->format('h:i A') }}</div>
                            <div class="text-[10px] text-gray-400">({{ $msg->created_at->diffForHumans() }})</div>
                        </td>
                        <td class="p-4 align-top whitespace-nowrap">
                            <form action="{{ route('admin.contact.status', $msg->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" 
                                        class="text-xs font-semibold rounded-xl border-gray-200 py-1 px-2.5 focus:border-[#FE5D37] focus:ring-[#FE5D37] transition
                                            {{ $msg->status === 'unread' ? 'bg-amber-50 text-amber-800 border-amber-300' : '' }}
                                            {{ $msg->status === 'read' ? 'bg-blue-50 text-blue-800 border-blue-300' : '' }}
                                            {{ $msg->status === 'replied' ? 'bg-green-50 text-green-800 border-green-300' : '' }}">
                                    <option value="unread" {{ $msg->status === 'unread' ? 'selected' : '' }}>Unread</option>
                                    <option value="read" {{ $msg->status === 'read' ? 'selected' : '' }}>Read</option>
                                    <option value="replied" {{ $msg->status === 'replied' ? 'selected' : '' }}>Replied</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-4 align-top whitespace-nowrap">
                            <form action="{{ route('admin.contact.destroy', $msg->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-8 h-8 rounded-lg flex items-center justify-center transition-colors" title="Delete Message">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-gray-500">
                            <i class="fa-solid fa-inbox text-4xl mb-3 text-gray-300 block"></i>
                            <p class="font-medium">No contact messages found.</p>
                            @if($status)
                                <a href="{{ route('admin.contact.index') }}" class="text-xs text-[#FE5D37] hover:underline mt-2 inline-block">Clear status filter</a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-6">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
