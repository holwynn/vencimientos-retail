@extends('layouts.admin')

@section('content')
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="row gap-20 masonry pos-r">
      <div class="masonry-sizer col-md-6"></div>
      <div class="masonry-item  w-100">
        <div class="row gap-20">
          <!-- #Toatl Visits ==================== -->
          <div class='col-md-4'>
            <div class="layers bd bgc-white p-20">
              <div class="layer w-100 mB-10">
                <h6 class="lh-1">Productos totales</h6>
              </div>
              <div class="layer w-100">
                <div class="peers ai-sb fxw-nw">
                  <div class="peer peer-greed">
                    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                  </div>
                  <div class="peer">
                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $productsCount }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- #Total Page Views ==================== -->
          <div class='col-md-4'>
            <div class="layers bd bgc-white p-20">
              <div class="layer w-100 mB-10">
                <h6 class="lh-1">Vencimientos totales</h6>
              </div>
              <div class="layer w-100">
                <div class="peers ai-sb fxw-nw">
                  <div class="peer peer-greed">
                    <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                  </div>
                  <div class="peer">
                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{ $expirationsCount }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- #Unique Visitors ==================== -->
          <div class='col-md-4'>
            <div class="layers bd bgc-white p-20">
              <div class="layer w-100 mB-10">
                <h6 class="lh-1">Vencimientos proximos</h6>
              </div>
              <div class="layer w-100">
                <div class="peers ai-sb fxw-nw">
                  <div class="peer peer-greed">
                    <i class="fa fa-calendar-minus-o fa-2x" aria-hidden="true"></i>
                  </div>
                  <div class="peer">
                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="masonry-item col-md-12">
        <!-- #Sales Report ==================== -->
        <div class="bd bgc-white">
          <div class="layers">
            <div class="layer w-100">
              <div class="bgc-light-blue-500 c-white p-20">
                <div class="peers ai-c jc-sb gap-40">
                  <div class="peer peer-greed">
                    <h5>{{ ucfirst($today->formatLocalized('%B')) }}</h5>
                    <p class="mB-0">Vencimientos del mes</p>
                  </div>
                  <div class="peer">
                    <h3 class="text-right">{{ $expirations->count() }}</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive table-bordered p-20">
                <table class="table">
                  <thead>
                    <tr>
                      <th width="10%">Imagen</th>
                      <th>Nombre</th>
                      <th>Vencimiento</th>
                      <th>Cantidad</th>
                      <th>Estado</th>
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
                        <td>{{ $expiration->product->name }} </td>
                        <td>
                          {{ $expiration->expirationLocalized() }} 
                          (<strong>{{ $expiration->diffLocalized }}</strong>)
                        </td>
                        <td><span class="badge bgc-purple-50 c-black-700 p-10 lh-0 tt-c badge-pill">{{ $expiration->qty }}</span></td>
                        <td>
                          @if ($expiration->isExpired())
                            <span class="badge bgc-red-50 c-black-700 p-10 lh-0 tt-c badge-pill">Vencido</span>
                          @else
                            <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Por vencer</span>
                          @endif
                        </td>
                      </tr>  
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="ta-c bdT w-100 p-20">
            <a href="{{ route('admin.expirations') }}">Ver todos los vencimientos</a>
          </div>
        </div>
      </div>

      {{-- <div class="masonry-item col-md-12">
        <!-- #Monthly Stats ==================== -->
        <div class="bd bgc-white">
          <div class="layers">
            <div class="layer w-100 pX-20 pT-20">
              <h6 class="lh-1">Estadisticas <small>(todavia no funciona)</small></h6>
            </div>
            <div class="layer w-100 p-20">
              <canvas id="line-chart" height="220"></canvas>
            </div>
            <div class="layer bdT p-20 w-100">
              <div class="peers ai-c jc-c gapX-20">
                <div class="peer">
                  <span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span>
                  <small class="c-grey-500 fw-600">APPL</small>
                </div>
                <div class="peer fw-600">
                  <span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span>
                  <small class="c-grey-500 fw-600">Average</small>
                </div>
                <div class="peer fw-600">
                  <span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span>
                  <small class="c-grey-500 fw-600">Sales</small>
                </div>
                <div class="peer fw-600">
                  <span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span>
                  <small class="c-grey-500 fw-600">Profit</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</main>
@endsection
