@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Lista de productos</h3>
            {{-- <div class="card-options">
              {{ $products->links() }}
            </div> --}}
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')
            
            <form method="GET" action="{{ route('admin.products') }}">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">Producto</label>
                    <div class="input-icon">
                      <div class="input-icon-addon">
                        <span class="fe fe-shopping-cart"></span>
                      </div>
                      <input type="text" name="name" class="form-control" value="{{ Request::input('name') }}" placeholder="Producto">
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-label">UPC</label>
                    <div class="input-icon">
                      <div class="input-icon-addon">
                        <span class="fe fe-package"></span>
                      </div>
                      <input type="text" name="upc" class="form-control" value="{{ Request::input('upc') }}" placeholder="UPC" minlength="13" maxlength="13">
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

            {{ $products->links() }}
            
            @if($products->count() >= 1)
            <div class="table-responsive">
              <table class="table table-hover card-table table-vcenter">
                <thead>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>UPC</th>
                  <th>Opciones</th>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>
                        @if ($product->img)
                          <img src="{{ $product->img }}" alt="" class="h-8">
                        @else
                          <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">{{ $product->name }}</a>
                      </td>
                      <td>{{ $product->upc }}</td>
                      <td>
                        {{-- <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Editar</a> --}}
                        <a href="{{ route('admin.expirations.create', ['upc' => $product->upc]) }}" class="btn btn-primary btn-sm"><span class="fe fe-calendar"></span> Vencimiento</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <h4>No se encontraron productos.</h4>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
