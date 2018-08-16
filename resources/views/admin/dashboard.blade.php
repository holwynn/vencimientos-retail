@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        Dashboard
      </h1>
    </div>
    <div class="row row-cards">
      <div class="col-sm-6 col-lg-3">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-blue mr-3">
              <i class="fe fe-shopping-cart"></i>
            </span>
            <div>
              <h4 class="m-0"><a href="{{ route('admin.products') }}">{{ $productsCount }} <small>Productos</small></a></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-green mr-3">
              <i class="fe fe-calendar"></i>
            </span>
            <div>
              <h4 class="m-0"><a href="{{ route('admin.expirations') }}">{{ $expirationsCount }} <small>Vencimientos</small></a></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-red mr-3">
              <i class="fe fe-users"></i>
            </span>
            <div>
              <h4 class="m-0"><a href="{{ route('admin.users.edit', ['id' => auth()->user()->id]) }}">{{ $usersCount }} <small>Usuarios</small></a></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-yellow mr-3">
              <i class="fe fe-message-square"></i>
            </span>
            <div>
              <h4 class="m-0"><a href="javascript:void(0)">{{ $expirations->count() }} <small>Vencimientos del mes</small></a></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-cards row-deck">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Vencimientos de {{ ucfirst($today->formatLocalized('%B')) }}</h3>
          </div>
          {{-- Dashboard tables look better if they're not wrapped in the card body --}}
          {{-- <div class="card-body"> --}}
            @include('admin.components.errors')
            @include('admin.components.flash')
            <div class="table-responsive">
              <table class="table table-hover card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Vencimiento</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($expirations as $expiration)
                  <tr>
                    <td><a href="{{ route('admin.expirations.edit', ['id' => $expiration->id]) }}" class="text-inherit">{{ $expiration->product->name }}</a></td>
                    <td>
                      {{ $expiration->expirationLocalized() }} <br>
                      (<strong>{{ $expiration->diffLocalized }}</strong>)
                    </td>
                    <td>
                      {{ $expiration->qty }}
                    </td>
                    <td>
                      @if ($expiration->checked)
                      <span class="status-icon bg-success"></span> Revisado
                      @elseif ($expiration->isExpired())
                      <span class="status-icon bg-danger"></span> Vencido
                      @else
                      <span class="status-icon bg-warning"></span> Por vencer
                      @endif
                    </td>
                    <td class="text-right">
                      <div class="btn-list">
                        @if (!$expiration->checked)
                        <a href="#" class="btn btn-success btn-sm"
                           onclick="event.preventDefault();document.getElementById('checkExpiration-{{ $expiration->id}}').submit();">
                         <span class="fe fe-check"></span> Revisar
                        </a>
                        <form id="checkExpiration-{{ $expiration->id}}" action="{{ route('admin.expirations.update', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
                          @csrf
                          @method('PUT')
                          <input type="text" name="checked" value="1" hidden>
                        </form>
                        @endif
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
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
