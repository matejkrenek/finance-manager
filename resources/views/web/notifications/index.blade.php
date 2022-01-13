<x-layout>
    <div style="width: 48rem; margin: 8rem auto">
        <h1>Notifications</h1>
        <table>
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>                    
                @forelse ($notifications as $notification)
                    <tr>

                        <td>{{ $notification->created_at }}</td>
                        <td>{{ $notification->type }}</td>
                        <td>{{ $notification->data['name'] }}</td>
                        <td>{{ $notification->data['email'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">
                            No notifications
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>     