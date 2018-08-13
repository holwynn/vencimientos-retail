@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Editar producto</h3>
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')

            <form method="POST" action="{{ route('admin.products.update', ['id' => $product->id]) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="{{ $product->name }}">
              </div>

              <div class="form-group">
                <label class="form-label">UPC</label>
                <input type="text" name="upc" value="{{ $product->upc }}" class="form-control" readonly>
                <small>No es posible modificar el codigo UPC del producto.</small>
              </div>

              <div class="form-group">
                <label class="form-label">Imagen <span class="text-muted">(opcional)</span></label>
                <input type="text" name="img" value="{{ $product->img }}" class="form-control" placeholder="">
              </div>

              <button type="submit" class="btn btn-primary">Actualizar</button>

            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="mb-4 text-center">
              <h3>Preview</h3>
              @if ($product->img)
                <img src="{{ $product->img }}" class="img-fluid">
              @else
                <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                <p>Sin imagen</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
