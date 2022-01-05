<body>
    <h1>You were invited to workspace</h1>
    <ul>
        <li>Workspace: <strong>{{ $invitation->workspace->name }}</strong></li>
        <li>Inviter: <strong>{{ $invitation->inviter->full_name }}</strong></li>
        <li>Expires At: <strong>{{ $invitation->expires_at }}</strong></li>
    </ul>

    <a href="{{ route('workspace.invitation', ['workspace' => $invitation->workspace, 'token' => $invitation->token, 'email' => $invitation->email]) }}">Accept Invitation</a>
</body>