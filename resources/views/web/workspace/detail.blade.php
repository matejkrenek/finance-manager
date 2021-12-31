<x-layout>
    <h1>{{ $workspace->name }}</h1>
    <p>{{ $workspace->description }}</p>
    <p>{{ $workspace->author->email }}</p>
    @can('update', $workspace)
        <a href="{{ route('workspace.members.add', ['workspace' => $workspace]) }}">Invite to workspace</a>
    @endcan
</x-layout> 