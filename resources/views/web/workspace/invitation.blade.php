<x-layout>

    <div style="width: 48rem; margin: 8rem auto">
        <h1>Pozvnánka do Workspacu: <strong>{{ $invitation->workspace->name }}</strong></h1>
        <p class="mb-4">Od uživatele: <strong>{{ $invitation->inviter->email }}</strong></p>
        <x-messages />
        <div class="flex items-center justify-between">
            <form method="POST" action="{{ route('workspace.invitation.accept', ['workspace' => $invitation->workspace, 'token' => $invitation->token]) }}">
                @csrf
                <button type="submit">Accept invitation</button>
            </form>
            <form method="POST" action="{{ route('workspace.invitation.reject', ['workspace' => $invitation->workspace, 'token' => $invitation->token]) }}">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </div>
    </div>
</x-layout>