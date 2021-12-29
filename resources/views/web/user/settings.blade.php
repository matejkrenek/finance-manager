<x-layout>
    <h1>User Settings</h1>
    <div style="width: 48rem; margin: 8rem auto">

        <!-- Validation Errors -->
        <x-errors />

        <form method="POST" action="{{ route('user.settings.basic') }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <h1 class="text-xl mb-4">Zakladni udaje</h1>

            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" value="{{ Auth::user()->email }}" required readonly>
            </div>

            <div class="mt-4">
                <label for="first_name" class="block font-medium text-sm text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" value="{{ Auth::user()->first_name }}">
            </div>

            <div class="mt-4">
                <label for="last_name" class="block font-medium text-sm text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" value="{{ Auth::user()->last_name }}">
            </div>

            <div class="mt-4">
                <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
            </div>


            <div class="flex items-center justify-end mt-6">

                <button type="submit" class="ml-3">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
        <form method="POST" action="{{ route('user.settings.password') }}">
            @csrf
            @method("PUT")

            <h1 class="text-xl mb-4">Change Password</h1>

            <div>
                <label for="current_password" class="block font-medium text-sm text-gray-700">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required>
            </div>

            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
                <input type="password" name="password" id="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">New Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="ml-3">
                    {{ __('Change Password') }}
                </button>
            </div>
        </form>
    </div>
</x-layout>     