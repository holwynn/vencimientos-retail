@extends('layouts.admin')

@section('content')
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Listado de productos</h4>
            <table class="table table-bordered">
              <thead class="thead">
                <tr>
                  <th width="10%" scope="col">Imagen</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">UPC</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td class="text-center"><img height="50px" src="{{ $product->img }}" alt=""></td>
                    <td>
                      <a href="{{ route('admin.products.show', ['id' => $product->id]) }}">
                        {{ $product->name }}
                      </a>
                    </td>
                    <td>{{ $product->upc }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div>
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
