@if (session('message'))
<div class="alert alert-primary" role="alert">
  <span>{{ session('message') }}</span>
</div>
@endif

@if (session('message-w'))
<div class="alert alert-warning" role="alert">
  <span>{{ session('message-w') }}</span>
</div>
@endif

@if (session('message-s'))
<div class="alert alert-success" role="alert">
  <span>{{ session('message-s') }}</span>
</div>
@endif

@if (session('message-d'))
<div class="alert alert-danger" role="alert">
  <span>{{ session('message-d') }}</span>
</div>
@endif
