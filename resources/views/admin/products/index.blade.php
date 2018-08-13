@extends('layouts.admin')

@section('content')
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row row-cards">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-indigo">
            <h3 style="color: #fafafa;" class="card-title">Lista de productos</h3>
          </div>
          <div class="card-header" style="padding-top: 20px;">
            {{ $products->links() }}
          </div>
          <div class="card-body">
            @include('admin.components.errors')
            @include('admin.components.flash')
            
            <div class="table-responsive">
              <table class="table card-table table-vcenter">
                <thead>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>UPC</th>
                  <th></th>
                  <th></th>
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
                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                      </td>
                      <td>
                        <a href="{{ route('admin.expirations.create', ['upc' => $product->upc]) }}" class="btn btn-indigo btn-sm">Vencimiento</a>
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
</div>
@endsection
