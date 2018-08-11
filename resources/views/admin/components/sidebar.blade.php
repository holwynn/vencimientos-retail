<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class="sidebar-link td-n" href="{{ route('admin.dashboard') }}">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo">
                  <img src="{{ asset('assets/admin/static/images/logo.png') }}" alt="">
                  
                </div>
              </div>
              <div class="peer peer-greed">
                <h5 class="lh-1 mB-0 logo-text">VenciPro</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="peer">
          <div class="mobile-toggle sidebar-toggle">
            <a href="" class="td-n">
              <i class="ti-arrow-circle-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- ### $Sidebar Menu ### -->
    <ul class="sidebar-menu scrollable pos-r">
      <li class="nav-item mT-30 active">
        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
          <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-orange-500 ti-layout-list-thumb"></i>
          </span>
          <span class="title">Productos</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class='sidebar-link' href="{{ route('admin.products') }}">Lista</a>
          </li>
          <li>
            <a class='sidebar-link' href="datatable.html">Agregar</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-deep-orange-500 ti-calendar"></i>
          </span>
          <span class="title">Vencimentos</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class='sidebar-link' href="basic-table.html">Lista</a>
          </li>
          <li>
            <a class='sidebar-link' href="datatable.html">Agregar</a>
          </li>
        </ul>
      </li>
      {{-- <li class="nav-item">
        <a class='sidebar-link' href="charts.html">
          <span class="icon-holder">
            <i class="c-indigo-500 ti-bar-chart"></i>
          </span>
          <span class="title">Charts</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class='sidebar-link' href="{{ route('admin.users.show', ['id' => auth()->user()->id]) }}">
          <span class="icon-holder">
            <i class="c-light-blue-500 ti-pencil"></i>
          </span>
          <span class="title">Mi perfil</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-red-500 ti-settings"></i>
          </span>
          <span class="title">Administracion</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class='sidebar-link' href="blank.html">Usuarios</a>
          </li>                 
          <li>
            <a class='sidebar-link' href="404.html">Tiendas</a>
          </li>
          <li>
            <a class='sidebar-link' href="500.html">Logs</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
