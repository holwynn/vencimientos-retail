@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Mi perfil</h3>
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')
            <form method="POST" action="{{ route('admin.users.update', ['id' => $user->id]) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="{{ $user->name }}" required>
              </div>

              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="{{ $user->email }}" required>
              </div>

              <div class="form-group">
                <label class="form-label">Contrasena</label>
                <input type="password" name="password" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
