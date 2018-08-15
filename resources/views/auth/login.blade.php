@extends('layouts.auth')

@section('content')
<div class="row">
  <div class="col col-login mx-auto">
    <div class="text-center mb-6">
      <img src="./demo/brand/tabler.svg" class="h-6" alt="">
    </div>
    <form method="POST" class="card" action="{{ route('login') }}">
      @csrf
      <div class="card-body p-6">
        <div class="card-title">Iniciar sesion</div>
        <div class="form-group">
          <label class="form-label">Correo electrónico</label>
          <div class="input-icon">
            <span class="input-icon-addon">
              <i class="fe fe-mail"></i>
            </span>
            <input type="email" name="email" class="form-control" placeholder="Email" autofocus="" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Contraseña</label>
          <div class="input-icon">
            <div class="input-icon-addon">
              <i class="fe fe-lock"></i>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
          </div>
        </div>
        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" />
            <span class="custom-control-label">Recordame</span>
          </label>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted">
      2018 VenciPro
    </div>
  </div>
</div>
@endsection
