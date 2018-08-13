@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Editar vencimiento</h3>
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')
            <form method="POST" action="{{ route('admin.expirations.update', ['id' => $expiration->id]) }}">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label class="form-label">Cantidad</label>
                <input type="text" name="qty" value="{{ $expiration->qty }}" class="form-control" placeholder="{{ $expiration->qty }}">
              </div>

              <div class="form-group">
                <label class="form-label">Fecha de vencimiento</label>
                <input type="date" name="expiration" value="{{ $expiration->expiration->format('Y-m-d') }}" class="form-control" >
              </div>

              <div class="form-group">
                <label class="form-label">Estado</label>
                <input type="text" value="{{ $expiration->checked ? 'Revisado' : 'Por vencer' }}" class="form-control" disabled>
              </div>

              <button type="submit" class="btn btn-primary">Actualizar</button>
              <a href="#" class="btn btn-success"
                 onclick="event.preventDefault();document.getElementById('checkExpiration').submit();">
                 Revisar
               </a>
              <a href="#" class="btn btn-danger"
                 onclick="event.preventDefault();document.getElementById('deleteExpiration').submit();">
                 Eliminar
               </a>
            </form>

            <form id="checkExpiration" action="{{ route('admin.expirations.check', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
              @csrf
              @method('PUT')
            </form>

            <form id="deleteExpiration" action="{{ route('admin.expirations.destroy', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
              @csrf
              @method('DELETE')
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="mb-4 text-center">
              <h3>Preview</h3>
              @if ($expiration->product->img)
                <img src="{{ $expiration->product->img }}" class="img-fluid">
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
