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
                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $products }}</span>
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
                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{ $expirations }}</span>
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
                    <h5>Agosto 2018</h5>
                    <p class="mB-0">Vencimientos del mes</p>
                  </div>
                  <div class="peer">
                    <h3 class="text-right">12</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive p-20">
                <table class="table">
                  <thead>
                    <tr>
                      <th class=" bdwT-0">Nombre</th>
                      <th class=" bdwT-0">Dia</th>
                      <th class=" bdwT-0">Date</th>
                      <th class=" bdwT-0">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-600">Item #1 Name</td>
                      <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Unavailable</span> </td>
                      <td>Nov 18</td>
                      <td><span class="text-success">$12</span></td>
                    </tr>
                    <tr>
                      <td class="fw-600">Item #2 Name</td>
                      <td><span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill">New</span></td>
                      <td>Nov 19</td>
                      <td><span class="text-info">$34</span></td>
                    </tr>
                    <tr>
                      <td class="fw-600">Item #3 Name</td>
                      <td><span class="badge bgc-pink-50 c-pink-700 p-10 lh-0 tt-c badge-pill">New</span></td>
                      <td>Nov 20</td>
                      <td><span class="text-danger">-$45</span></td>
                    </tr>
                    <tr>
                      <td class="fw-600">Item #4 Name</td>
                      <td><span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Unavailable</span></td>
                      <td>Nov 21</td>
                      <td><span class="text-success">$65</span></td>
                    </tr>
                    <tr>
                      <td class="fw-600">Item #5 Name</td>
                      <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Used</span></td>
                      <td>Nov 22</td>
                      <td><span class="text-success">$78</span></td>
                    </tr>
                    <tr>
                      <td class="fw-600">Item #6 Name</td>
                      <td><span class="badge bgc-orange-50 c-orange-700 p-10 lh-0 tt-c badge-pill">Used</span> </td>
                      <td>Nov 23</td>
                      <td><span class="text-danger">-$88</span></td>
                    </tr>
                    <tr>
                      <td class="fw-600">Item #7 Name</td>
                      <td><span class="badge bgc-yellow-50 c-yellow-700 p-10 lh-0 tt-c badge-pill">Old</span></td>
                      <td>Nov 22</td>
                      <td><span class="text-success">$56</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="ta-c bdT w-100 p-20">
            <a href="#">Check all the sales</a>
          </div>
        </div>
      </div>

      <div class="masonry-item col-md-12">
        <!-- #Monthly Stats ==================== -->
        <div class="bd bgc-white">
          <div class="layers">
            <div class="layer w-100 pX-20 pT-20">
              <h6 class="lh-1">Estadisticas <small>(todavia no funciona)</small></h6>
            </div>
            <div class="layer w-100 p-20">
              <canvas id="line-chart" height="220"></canvas>
            </div>
            {{-- <div class="layer bdT p-20 w-100">
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
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
