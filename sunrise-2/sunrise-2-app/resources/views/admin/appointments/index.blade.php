<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-[#103741] leading-tight font-lobster">
                    {{ __('Campus Appointment Requests') }}
                </h2>
                <p class="text-xs text-gray-500 mt-1">Manage parent campus visits and admission appointment inquiries.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-100 text-[#FE5D37]">
                    Total: {{ $counts['all'] }}
                </span>
                @if($counts['pending'] > 0)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 animate-pulse">
                        {{ $counts['pending'] }} Pending
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
        <a href="{{ route('admin.appointments.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ empty($status) ? 'bg-[#103741] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
            All Requests ({{ $counts['all'] }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'pending']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'pending' ? 'bg-amber-500 text-white shadow-md' : 'bg-white text-amber-700 hover:bg-amber-50 border border-amber-200' }}">
            Pending ({{ $counts['pending'] }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'confirmed']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'confirmed' ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-blue-700 hover:bg-blue-50 border border-blue-200' }}">
            Confirmed ({{ $counts['confirmed'] }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'completed']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'completed' ? 'bg-green-600 text-white shadow-md' : 'bg-white text-green-700 hover:bg-green-50 border border-green-200' }}">
            Completed ({{ $counts['completed'] }})
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'cancelled']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all {{ $status === 'cancelled' ? 'bg-red-600 text-white shadow-md' : 'bg-white text-red-700 hover:bg-red-50 border border-red-200' }}">
            Cancelled ({{ $counts['cancelled'] }})
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-3xl">
        <div class="p-6 text-gray-900 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4 rounded-tl-xl">Guardian Info</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Child Details</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Message / Notes</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Date</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4">Status</th>
                        <th class="text-xs font-semibold text-gray-500 uppercase tracking-wider p-4 rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse ($appointments as $appointment)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="p-4 align-top">
                            <div class="font-bold text-[#103741] text-base">{{ $appointment->guardian_name }}</div>
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-envelope text-gray-400"></i>
                                <a href="mailto:{{ $appointment->guardian_email }}" class="hover:text-[#FE5D37] underline">{{ $appointment->guardian_email }}</a>
                            </div>
                            @if($appointment->guardian_phone)
                            <div class="text-xs text-gray-500 mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-phone text-gray-400"></i>
                                <a href="tel:{{ $appointment->guardian_phone }}" class="hover:text-[#FE5D37]">{{ $appointment->guardian_phone }}</a>
                            </div>
                            @endif
                        </td>
                        <td class="p-4 align-top">
                            <div class="font-semibold text-gray-800">{{ $appointment->child_name }}</div>
                            <div class="inline-flex items-center text-xs font-medium px-2 py-0.5 rounded-full bg-orange-50 text-[#FE5D37] mt-1 border border-orange-200/50">
                                Age: {{ $appointment->child_age }}
                            </div>
                        </td>
                        <td class="p-4 align-top max-w-xs">
                            @if($appointment->message)
                                <p class="text-gray-600 italic bg-gray-50 p-2.5 rounded-xl border border-gray-100 text-xs">
                                    "{{ $appointment->message }}"
                                </p>
                            @else
                                <span class="text-xs text-gray-400 italic">No additional message</span>
                            @endif
                        </td>
                        <td class="p-4 align-top whitespace-nowrap text-xs text-gray-500">
                            <div>{{ $appointment->created_at->format('M d, Y') }}</div>
                            <div class="text-gray-400 text-[11px]">{{ $appointment->created_at->format('h:i A') }}</div>
                            <div class="text-[10px] text-gray-400">({{ $appointment->created_at->diffForHumans() }})</div>
                        </td>
                        <td class="p-4 align-top">
                            <form action="{{ route('admin.appointments.status', $appointment->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" 
                                        class="text-xs font-semibold rounded-xl border-gray-200 py-1 px-2.5 focus:border-[#FE5D37] focus:ring-[#FE5D37] transition
                                            {{ $appointment->status === 'pending' ? 'bg-amber-50 text-amber-800 border-amber-300' : '' }}
                                            {{ $appointment->status === 'confirmed' ? 'bg-blue-50 text-blue-800 border-blue-300' : '' }}
                                            {{ $appointment->status === 'completed' ? 'bg-green-50 text-green-800 border-green-300' : '' }}
                                            {{ $appointment->status === 'cancelled' ? 'bg-red-50 text-red-800 border-red-300' : '' }}">
                                    <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $appointment->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-4 align-top">
                            <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this appointment request?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 w-8 h-8 rounded-lg flex items-center justify-center transition-colors" title="Delete Appointment">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-gray-500">
                            <i class="fa-solid fa-calendar-xmark text-4xl mb-3 text-gray-300 block"></i>
                            <p class="font-medium">No appointment requests found.</p>
                            @if($status)
                                <a href="{{ route('admin.appointments.index') }}" class="text-xs text-[#FE5D37] hover:underline mt-2 inline-block">Clear status filter</a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-6">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
