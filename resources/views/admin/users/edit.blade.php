@extends('layouts.admin')

@section('content')
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="row gap-20 masonry pos-r">
      <div class="masonry-sizer col-md-4"></div>
      <div class="masonry-item col-md-8">
        <div class="bgc-white p-20 bd">
          {{-- Errors --}}
          @include('admin.components.errors')
          @include('admin.components.flash')
          
          <h6 class="c-grey-900">Mi perfil</h6>
          <div class="mT-30">
            <form method="POST" action="{{ route('admin.users.update', ['id' => $user->id]) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="{{ $user->name }}" required>
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="{{ $user->email }}" required>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="******">
              </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
