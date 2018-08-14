@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Lista de vencimientos</h3>
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')

            <form method="GET" action="{{ route('admin.expirations') }}">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">Desde</label>
                    <div class="input-icon">
                      <div class="input-icon-addon">
                        <span class="fe fe-calendar"></span>
                      </div>
                      <input type="date" name="dateFrom" class="form-control" value="{{ Request::input('since') }}">
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">Hasta</label>
                    <div class="input-icon">
                      <div class="input-icon-addon">
                        <span class="fe fe-calendar"></span>
                      </div>
                      <input type="date" name="dateTo" class="form-control" value="{{ Request::input('to') }}">
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">Resultados</label>
                    <select class="form-control" name="paginate" id="">
                      <option value="10" {{ Request::input('paginate') == 10 ? 'selected' : ''}}>10</option>
                      <option value="25" {{ Request::input('paginate') == 25 ? 'selected' : ''}}>25</option>
                      <option value="50" {{ Request::input('paginate') == 50 ? 'selected' : ''}}>50</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">Buscar</label>
                    <button type="submit" class="btn btn-primary btn-block"><span class="fe fe-search"></span> Buscar</button>
                  </div>
                </div>
              </div>
            </form>

            {{ $expirations->links() }}
            
            @if ($expirations->count() >= 1)
              <div class="table-responsive">
                <table class="table table-hover card-table table-vcenter">
                  <thead>
                    <tr>
                      <th class="w-1">Imagen</th>
                      <th>Nombre</th>
                      <th>Vencimiento</th>
                      <th>Cantidad</th>
                      <th class="text-center">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($expirations as $expiration)
                      <tr @if($expiration->isExpired()) class="table-danger" @endif>
                        <td>
                          @if ($expiration->product->img)
                            <img src="{{ $expiration->product->img }}" alt="" class="h-8">
                          @else
                            <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('admin.expirations.edit', ['id' => $expiration->id]) }}">{{ $expiration->product->name }}</a>
                        </td>
                        <td>
                          {{ $expiration->expirationLocalized(true) }} <br>
                          (<strong>{{ $expiration->diffLocalized }}</strong>)
                        </td>
                        <td>{{ $expiration->qty }}</td>
                        <td>
                          <div class="btn-list text-center">
                            <a href="{{ route('admin.expirations.edit', ['id' => $expiration->id]) }}" class="btn btn-primary btn-sm"><span class="fe fe-edit"></span> Editar</a>
                            <a href="#" class="btn btn-danger btn-sm"
                               onclick="event.preventDefault();document.getElementById('deleteExpiration-{{ $expiration->id}}').submit();">
                             <span class="fe fe-trash-2"></span> Eliminar
                            </a>
                            <form id="deleteExpiration-{{ $expiration->id}}" action="{{ route('admin.expirations.destroy', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <h4>No se encontraron vencimientos.</h4>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
