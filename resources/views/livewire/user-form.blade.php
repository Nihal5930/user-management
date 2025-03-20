<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
        {{ $userId ? 'Edit User' : 'Create User' }}
    </h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded-md mb-4 text-center">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <!-- Prefix -->
            <div>
                <label class="block text-gray-600">Prefix</label>
                <select wire:model="prefixname" class="w-full border border-gray-400 rounded-lg p-2 focus:border-blue-500 focus:ring">
                    <option value="">Select Prefix</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Dr.">Dr.</option>
                </select>
                @error('prefixname') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- First Name -->
            <div>
                <label class="block text-gray-600">First Name</label>
                <input type="text" wire:model="firstname" class="w-full border border-gray-400 rounded-lg p-2 focus:border-blue-500 focus:ring">
                @error('firstname') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <!-- Middle Name -->
            <div>
                <label class="block text-gray-600">Middle Name</label>
                <input type="text" wire:model="middlename" class="w-full border border-gray-400 rounded-lg p-2 focus:border-blue-500 focus:ring">
                @error('middlename') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Last Name -->
            <div>
                <label class="block text-gray-600">Last Name</label>
                <input type="text" wire:model="lastname" class="w-full border border-gray-400 rounded-lg p-2 focus:border-blue-500 focus:ring">
                @error('lastname') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-600">Email</label>
            <input type="email" wire:model="email" class="w-full border border-gray-400 rounded-lg p-2 focus:border-blue-500 focus:ring">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Profile Photo -->
        <div>
            <label class="block text-gray-600">Profile Photo</label>
            <input type="file" wire:model="photo" class="w-full border border-gray-400 rounded-lg p-2 focus:border-blue-500 focus:ring">
            @error('photo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            @if ($existingPhoto)
                <img src="{{ asset('storage/' . $existingPhoto) }}" class="mt-2 w-20 h-20 rounded-full border border-gray-400">
            @endif
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">
                {{ $userId ? 'Update' : 'Save' }}
            </button>
        </div>
    </form>
</div>
