<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">User List</h2>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-center">
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border text-center">
                    <td class="border p-2">{{ $user->firstname }} {{ $user->lastname }}</td>
                    <td class="border p-2">{{ $user->email }}</td>
                    <td class="border p-2">
                        <button wire:click="edit({{ $user->id }})" class="text-blue-600 hover:text-blue-800 text-lg mx-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="delete({{ $user->id }})" class="text-red-600 hover:text-red-800 text-lg mx-2">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
