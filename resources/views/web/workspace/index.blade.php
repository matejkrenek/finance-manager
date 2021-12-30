<x-layout>
    <div style="width: 48rem; margin: 8rem auto">
        <h1 class="mb-4">Workspacy</h1>
        <x-messages />
        @forelse ($workspaces as $workspace)
            <a href="{{ route('workspace.detail', ['workspace' => $workspace]) }}" class="text-xl">{{ $workspace->name }}</a>
            <p>{{ $workspace->description }}</p>
            <p>author: <span class="text-lg" style="font-weight: bold;">    {{ $workspace->author->email }}</span></p>
            <p>members:  
                @foreach ($workspace->members as $workspace_member)

                    @if (!$loop->last)
                        <span class="text-lg" style="font-weight: bold;">{{ $workspace_member->email }}, </span>
                    @else
                    <span class="text-lg" style="font-weight: bold;">{{ $workspace_member->email }}</span>
                    @endif

                @endforeach
            </p>
            <a href="{{ route('workspace.detail', ['workspace' => $workspace]) }}">Detail</a>
            <br>
        @empty
            <p>No workspaces</p>
        @endforelse
    </div>
</x-layout>