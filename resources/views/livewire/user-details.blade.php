<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">User Background Details</h2>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-center">
                <th class="border p-2">User Name</th>
                <th class="border p-2">Middle Initial</th>
                <th class="border p-2">Avatar</th>
                <th class="border p-2">Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userDetails as $user)
                <tr class="border text-center">
                    <td class="border p-2">{{ $user->firstname }} {{ $user->lastname }}</td>
                    <td class="border p-2">
                        {{ optional($user->details->where('key', 'middle_initial')->first())->value ?? 'N/A' }}
                    </td>
                    <td class="border p-2">
                        @if(optional($user->details->where('key', 'avatar')->first())->value)
                            <img src="{{ asset('storage/' . $user->details->where('key', 'avatar')->first()->value) }}" class="w-10 h-10 rounded-full mx-auto">
                        @else
                            <span class="text-gray-500">No Avatar</span>
                        @endif
                    </td>
                    <td class="border p-2">
                        {{ optional($user->details->where('key', 'gender')->first())->value ?? 'N/A' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ✅ Add Pagination -->
    <div class="mt-4">
        {{ $userDetails->links() }}
    </div>
</div>
