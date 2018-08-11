@if ($errors->any())
<div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $error)
  <span>{{ $error }}</span> <br>
  @endforeach
</div>
@endif
