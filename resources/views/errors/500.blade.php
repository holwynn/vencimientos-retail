@extends('layouts.error')

@section('content')
<div class="page">
  <div class="page-content">
    <div class="container text-center">
      <div class="display-1 text-muted mb-5"><i class="si si-exclamation"></i> 500</div>
      <h1 class="h2 mb-3">Exploto el server</h1>
      <p class="h4 text-muted font-weight-normal mb-7">Hubo un problema en el servidor. Por favor intente mas tarde.</p>
      <a class="btn btn-primary" href="javascript:history.back()">
        <i class="fe fe-arrow-left mr-2"></i>Volver
      </a>
    </div>
  </div>
</div>
@endsection
