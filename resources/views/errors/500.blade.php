@extends('layouts.error')
<div class='pos-a t-0 l-0 bgc-white w-100 h-100 d-f fxd-r fxw-w ai-c jc-c pos-r p-30'>
  <div class='mR-60'>
    <img alt="#" src="{{ asset('assets/admin/static/images/500.png') }}" />
  </div>

  <div class='d-f jc-c fxd-c'>
    <h1 class='mB-30 fw-900 lh-1 c-red-500' style="font-size: 60px;">500</h1>
    <h3 class='mB-10 fsz-lg c-grey-900 tt-c'>Exploto el server</h3>
    <p class='mB-30 fsz-def c-grey-700'>Hubo un problema en el servidor. Por favor intente mas tarde.</p>
    <div>
      <a href="{{ route('admin.dashboard') }}" type='primary' class='btn btn-primary'>Volver</a>
    </div>
  </div>
</div>