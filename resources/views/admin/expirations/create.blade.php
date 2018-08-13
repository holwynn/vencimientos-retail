@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Agregar vencimiento</h3>
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')
            <form method="POST" action="{{ route('admin.expirations.store') }}">
              @csrf
              <div class="form-group">
                <label class="form-label">UPC del producto</label>
                <input type="text" name="upc" value="{{ $upc }}" class="form-control" minlength="13" maxlength="13" required>
              </div>

              <div class="form-group">
                <label class="form-label">Cantidad</label>
                <input type="text" name="qty" class="form-control">
              </div>

              <div class="form-group">
                <label class="form-label">Fecha de vencimiento</label>
                <input type="date" name="expiration" class="form-control">
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
