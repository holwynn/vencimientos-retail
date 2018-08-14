{{-- active = "nav-link active" --}}
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 ml-auto">
        <form class="input-icon my-3 my-lg-0">
          <input type="search" class="form-control header-search" placeholder="Buscar&hellip;" tabindex="1">
          <div class="input-icon-addon">
            <i class="fe fe-search"></i>
          </div>
        </form>
      </div>
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" data-location="dashboard" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" data-location="products" data-toggle="dropdown"><i class="fe fe-shopping-cart"></i> Productos</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="{{ route('admin.products') }}" class="dropdown-item ">Lista</a>
              <a href="{{ route('admin.products.create') }}" class="dropdown-item ">Agregar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link" data-location="expirations" data-toggle="dropdown"><i class="fe fe-calendar"></i> Vencimientos</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="{{ route('admin.expirations') }}" class="dropdown-item ">Lista</a>
              <a href="{{ route('admin.expirations.create') }}" class="dropdown-item ">Agregar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ route('admin.users.edit', ['id' => auth()->user()->id]) }}" data-location="users" class="nav-link"><i class="fe fe-check-square"></i> Mi Perfil</a>
          </li>
          <li class="nav-item">
            <a href="./docs/index.html" data-location="settings" class="nav-link"><i class="fe fe-file-text"></i> Administracion</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
