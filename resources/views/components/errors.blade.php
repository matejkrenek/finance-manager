@props(['bag' => 'basic'])

@if ($errors->any())
  <div class="row">
    <div class="col-md-12">
      @foreach ($errors->all() as $error)
          <div class="alert alert-error">{!! $error !!}</div>
      @endforeach
    </div>
  </div>
@endif