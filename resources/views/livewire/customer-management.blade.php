<div class="p-6 bg-gray-50 rounded-lg shadow-md">
    @if (session()->has('message'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            class="p-4 mb-4 bg-indigo-100 text-indigo-800 rounded-md"
        >
            {{ session('message') }}
        </div>
    @endif

    <h3 class="text-xl font-semibold mb-4">{{ $isEditMode ? 'Edit Customer' : 'Add New Customer' }}</h3>

    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="space-y-4">
        <div class="flex space-x-4">
            <div class="w-full">
            <input type="text" wire:model="first_name" placeholder="First Name" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
            @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="w-full">
            <input type="text" wire:model="last_name" placeholder="Last Name" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
            @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex space-x-4">
            <div class="w-full">
            <input type="number" wire:model="age" placeholder="Age" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
            @error('age') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="w-full">
            <input type="date" wire:model="dob" placeholder="Date of Birth" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
            @error('dob') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="w-full">
            <input type="email" wire:model="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="py-2 px-6 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-200">
            {{ $isEditMode ? 'Update' : 'Save' }}
        </button>
    </form>

    <h3 class="text-lg font-semibold mt-8 mb-4">Customer List</h3>

    <table class="w-full bg-white shadow rounded-md overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left">First Name</th>
                <th class="py-2 px-4 text-left">Last Name</th>
                <th class="py-2 px-4 text-left">Age</th>
                <th class="py-2 px-4 text-left">DOB</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr class="border-t border-gray-200 hover:bg-gray-100">
                    <td class="py-2 px-4">{{ $customer->first_name }}</td>
                    <td class="py-2 px-4">{{ $customer->last_name }}</td>
                    <td class="py-2 px-4">{{ $customer->age }}</td>
                    <td class="py-2 px-4">{{ $customer->dob }}</td>
                    <td class="py-2 px-4">{{ $customer->email }}</td>
                    <td class="py-2 px-4 flex space-x-2">
                        <button wire:click="edit({{ $customer->id }})" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">Edit</button>
                        <button wire:click="delete({{ $customer->id }})" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</div>
