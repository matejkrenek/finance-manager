@if (count($messages))
  <div class="row">
    <div class="col-md-12">
      @foreach ($messages as $message)
          <div class="alert alert-{{ $message['level'] }}">{!! $message['message'] !!}</div>
      @endforeach
    </div>
  </div>
@endif

@if ($errors->any())
  <div class="row">
    <div class="col-md-12">
      @foreach ($errors->all() as $error)
          <div class="alert alert-error">{!! $error !!}</div>
      @endforeach
    </div>
  </div>
@endif

