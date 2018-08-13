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
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div>
              <h4 class="m-0"><a href="javascript:void(0)">{{ $productsCount }} <small>Productos</small></a></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-green mr-3">
              <i class="fe fe-shopping-cart"></i>
            </span>
            <div>
              <h4 class="m-0"><a href="javascript:void(0)">{{ $expirationsCount }} <small>Vencimientos</small></a></h4>
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
              <h4 class="m-0"><a href="javascript:void(0)">{{ $usersCount }} <small>Usuarios</small></a></h4>
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
          @include('admin.components.errors')
          @include('admin.components.flash')
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Vencimiento</th>
                  <th>Cantidad</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($expirations as $expiration)
                <tr>
                  <td><a href="{{ route('admin.expirations.edit', ['id' => $expiration->id]) }}" class="text-inherit">{{ $expiration->product->name }}</a></td>
                  <td>
                    {{ $expiration->expirationLocalized() }} 
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
                    @if (!$expiration->checked)
                    <a href="#" class="btn btn-primary btn-sm"
                       onclick="event.preventDefault();document.getElementById('checkExpiration-{{ $expiration->id}}').submit();">
                     Revisar
                    </a>
                    <form id="checkExpiration-{{ $expiration->id}}" action="{{ route('admin.expirations.check', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
                      @csrf
                      @method('PUT')
                    </form>
                    @endif
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="event.preventDefault();document.getElementById('deleteExpiration-{{ $expiration->id}}').submit();">
                     Eliminar
                    </a>
                    <form id="deleteExpiration-{{ $expiration->id}}" action="{{ route('admin.expirations.destroy', ['id' => $expiration->id]) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
