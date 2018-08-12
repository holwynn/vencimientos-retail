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
          <h6 class="c-grey-900">Agregar vencimiento</h6>
          <div class="mT-30">
            <form method="POST" action="{{ route('admin.expirations.store') }}">
              @csrf

              <div class="form-group">
                <label for="">UPC del producto</label>
                <input type="text" name="upc" value="{{ $upc }}" class="form-control" minlength="13" maxlength="13" required>
              </div>
              <div class="form-group">
                <label for="">Cantidad</label>
                <input type="text" name="qty" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">Fecha de vencimiento</label>
                <input type="date" name="expiration" class="form-control" >
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
