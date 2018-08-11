@extends('layouts.admin')

@section('content')
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="row gap-20 masonry pos-r">
      <div class="masonry-sizer col-md-4"></div>
      <div class="masonry-item col-md-8">
        <div class="bgc-white p-20 bd">
          <h6 class="c-grey-900">Mi perfil</h6>
          <div class="mT-30">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" placeholder="{{ $user->name }}">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" placeholder="{{ $user->email }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" placeholder="******">
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
