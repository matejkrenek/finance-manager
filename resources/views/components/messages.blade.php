<div class="messages">
  @if (count($messages))
    <div class="row">
      <div class="col-md-12">
        @foreach ($messages as $message)
            <div class="alert alert-{{ $message['level'] }}">{!! $message['message'] !!}</div>
        @endforeach
      </div>
    </div>
  @endif
</div>

