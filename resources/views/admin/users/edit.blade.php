@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="media">
              <img src="{{ asset('assets/user.png') }}" alt="" class="avatar avatar-xxl mr-5">
              <div class="media-body">
                <h4 class="m-0">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->levelName }}</p>
                <p>{{ $user->email }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fe fe-user"></i>
                      </span>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="{{ $user->name }}" required>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fe fe-mail"></i>
                      </span>
                      <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="{{ $user->email }}" required>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fe fe-lock"></i>
                      </span>
                      <input type="password" name="password" class="form-control" placeholder="******">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-label">Avatar</div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="">
                      <label class="custom-file-label">Imagen</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
