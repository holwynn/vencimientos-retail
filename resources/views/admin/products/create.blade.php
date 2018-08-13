@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      @include('admin.components.errors')
      @include('admin.components.flash')
    </div>

    <div class="row row-cards">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Buscar en Walmart</h3>
          </div>
          <div class="card-body">
            <p>Busca el producto en la base de datos de Walmart. Si el producto es encontrado, se agregara a nuestra base de datos automaticamente.</p>
            <form method="POST" action="{{ route('admin.products.store.walmart') }}">
              @csrf
              <div class="form-group">
                <label class="form-label">UPC</label>
                <input type="text" name="upc" class="form-control" minlength="13" maxlength="13" required>
              </div>
              <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Agregar manualmente</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}">
              @csrf
              <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                <label class="form-label">UPC</label>
                <input type="text" name="upc" class="form-control" minlength="13" maxlength="13" required>
              </div>

              <div class="form-group">
                <label class="form-label">Imagen <span class="text-muted">(opcional)</span></label>
                <input type="text" name="img" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
