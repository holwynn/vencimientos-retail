@extends('layouts.error')

@section('content')
<div class="page">
  <div class="page-content">
    <div class="container text-center">
      <div class="display-1 text-muted mb-5"><i class="si si-exclamation"></i> 403</div>
      <h1 class="h2 mb-3">Sin autorizacion</h1>
      <p class="h4 text-muted font-weight-normal mb-7">
        Parece que no estas autorizado a realizar esa accion. <br>
        Si crees que esto es un error, por favor ponete en contacto con un administrador.
      </p>
      <a class="btn btn-primary" href="javascript:history.back()">
        <i class="fe fe-arrow-left mr-2"></i>Volver
      </a>
    </div>
  </div>
</div>
@endsection
