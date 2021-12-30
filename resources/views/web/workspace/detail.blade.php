<x-layout>
    <h1>{{ $workspace->name }}</h1>
    <p>{{ $workspace->description }}</p>
    <p>{{ $workspace->author->email }}</p>
    <a href="{{ route('workspace.members.add', ['workspace' => $workspace]) }}">Invite to workspace</a>
</x-layout> 