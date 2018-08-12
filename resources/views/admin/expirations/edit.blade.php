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

          <h6 class="c-grey-900">Editar vencimiento</h6>
          <div class="mT-30">
            <form method="POST" action="{{ route('admin.expirations.update', ['id' => $expiration->id]) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="">Cantidad</label>
                <input type="text" name="qty" value="{{ $expiration->qty }}" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">Fecha de vencimiento</label>
                <input type="date" name="expiration" value="{{ $expiration->expiration->format('Y-m-d') }}" class="form-control" >
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
            <img class="img-fluid" src="{{ $expiration->product->img }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
