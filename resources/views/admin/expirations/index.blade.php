@extends('layouts.admin')

@section('content')
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Listado de vencimientos</h4>

            <div class="float-left">
              {{ $expirations->links() }}
            </div>

            <div class="float-right">
              <a href="{{ route('admin.expirations.create') }}"><button class="btn btn-success">Agregar</button></a>
            </div>

            <div class="clearfix"></div>

            <table class="table table-bordered table-hover" style="margin-top: 15px;">
              <thead class="thead">
                <tr>
                  <th width="10%" scope="col">Imagen</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Vencimiento</th>
                  <th scope="cold">Cantidad</th>
                  <th width="8%">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($expirations as $expiration)
                  <tr @if($expiration->isExpired()) class="table-danger" @endif>
                    <td class="text-center">
                      @if ($expiration->product->img)
                        <img height="50px" src="{{ $expiration->product->img }}" alt="">
                      @else
                        <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.products.edit', ['id' => $expiration->product->id]) }}">
                        {{ $expiration->product->name }}
                      </a>
                    </td>
                    <td>
                        {{ $expiration->expirationLocalized() }}
                        (<strong>{{ $expiration->diffLocalized }}</strong>)
                    </td>
                    <td><span class="badge bgc-purple-50 c-black-700 p-10 lh-0 tt-c badge-pill">{{ $expiration->qty }}</span></td>
                    <td>
                      <a href="{{ route('admin.expirations.update', ['id' => $expiration->id]) }}"><button class="btn btn-primary">Editar</button></a>
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
</main>
@endsection
