@extends('layouts.admin')

@section('content')
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="row gap-20 masonry pos-r">
      <div class="masonry-sizer col-md-12"></div>
      <div class="masonry-item col-md-12">
        <div class="bgc-white p-20 bd">
          {{-- Errors --}}
          @include('admin.components.errors')
          @include('admin.components.flash')

          <h6 class="c-grey-900">Buscar en Walmart</h6>
          <p>Busca el producto en la base de datos de Walmart. Si el producto es encontrado, se agregara a nuestra base de datos automaticamente.</p>
          <div class="mT-30">
            <form method="POST" action="{{ route('admin.products.store.walmart') }}">
              @csrf

              <div class="form-group">
                <label for="">UPC</label>
                <input type="text" name="upc" class="form-control" minlength="13" maxlength="13" required>
              </div>
              <button type="submit" class="btn btn-success">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row gap-20 masonry pos-r">
      <div class="masonry-sizer col-md-12"></div>
      <div class="masonry-item col-md-12">
        <div class="bgc-white p-20 bd">
          <h6 class="c-grey-900">Agregar producto manualmente</h6>
          <div class="mT-30">
            <form method="POST" action="{{ route('admin.products.store') }}">
              @csrf

              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">UPC</label>
                <input type="text" name="upc" class="form-control" minlength="13" maxlength="13" required>
              </div>
              <div class="form-group">
                <label for="">Imagen <small>(opcional)</small></label>
                <input type="text" name="img" class="form-control" >
              </div>
              <button type="submit" class="btn btn-success">Crear</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
