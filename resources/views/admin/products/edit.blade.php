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

          <h6 class="c-grey-900">Editar producto</h6>
          <div class="mT-30">
            <form method="POST" action="{{ route('admin.products.update', ['id' => $product->id]) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="{{ $product->name }}">
              </div>
              <div class="form-group">
                <label for="">UPC</label>
                <input type="text" name="upc" value="{{ $product->upc }}" class="form-control" placeholder="{{ $product->upc }}" readonly>
                <small>No es posible modificar el UPC del producto.</small>
              </div>
              <div class="form-group">
                <label for="">Imagen <small>(opcional)</small></label>
                <input type="text" name="img" value="{{ $product->img }}" class="form-control" placeholder="{{ $product->img }}">
              </div>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
          </div>
        </div>
      </div>

      <div class="masonry-item col-md-4">
        <div class="bgc-white p-20 bd">
          <h6 class="c-grey-900">Preview</h6>
          <div class="mT-30">
            <img class="img-fluid" src="{{ $product->img }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
