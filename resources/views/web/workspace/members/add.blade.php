<x-layout>
    <h1>Přidaní uživatelů do workspacu</h1>
    <div style="width: 48rem; margin: 8rem auto">
        <x-messages />
        <form method="POST" action="{{ route('workspace.members.add', ['workspace' => $workspace]) }}">
            @csrf

            <div class="mt-4">
                <label for="members" class="block font-medium text-sm text-gray-700">Členové</label>
                @if (count($users))
                    <select name="members[]" id="members" multiple>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                @else
                    <p>No other users in the system</p>
                @endif
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="ml-3">
                    {{ __('Add') }}
                </button>
            </div>
        </form>
    </div>
</x-layout>