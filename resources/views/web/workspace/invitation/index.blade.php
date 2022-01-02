<x-layout>
    <div style="width: 48rem; margin: 8rem auto">
        <h1>Všechny pozvánky ve workspacu</h1>
        <table>
            <thead>
                <tr>
                    <th>Zvaný</th>
                    <th>Datum</th>
                    <th>Platnost</th>
                    <th>Stav</th>
                </tr>
            </thead>
            <tbody>                    
                @forelse ($invitations as $invitation)
                    <tr>
                        <td>{{ $invitation->email }}</td>
                        <td>{{ $invitation->created_at }}</td>
                        <td>{{ $invitation->expires_at }}</td>
                        <td>{{ $invitation->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">
                            No invitations
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>