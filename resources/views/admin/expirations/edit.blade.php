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

            <form id="checkExpiration" action="{{ route('admin.expirations.update', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
              @csrf
              @method('PUT')
              <input type="text" name="checked" value="1" hidden>
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
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Producto</h3>
          </div>
          <div class="card-body">
            <div class="mb-4 text-center">
              <p>{{ $expiration->product->name }}</p>
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

      @if ($logs->count() >= 1)
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-indigo">
              <h3 style="color: #fafafa;" class="card-title">Logs</h3>
            </div>
            <div class="card-body">
              <table class="responsive">
                <table class="table table-hover card-table table-vcenter">
                  <thead>
                    <th>Dia</th>
                    <th>Usuario</th>
                    <th>Accion</th>
                  </thead>
                  <tbody>
                    @foreach ($logs as $log)
                      <tr>
                        <td>{{ $log->created_at }}</td>
                        <td>{{ $log->user->name }}</td>
                        <td>{{ $log->message }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </table>
            </div>
          </div>
        </div>
      @endif 
    </div>
  </div>
</div>
@endsection
