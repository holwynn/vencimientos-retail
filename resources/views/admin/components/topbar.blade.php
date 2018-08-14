<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="{{ route('admin.dashboard') }}">
        <img height="40px" src="{{ asset('assets/logotest.png') }}" alt="company-logo">
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown d-none d-md-flex">
          <a class="nav-link icon" data-toggle="dropdown">
            <i class="fe fe-bell"></i>
            <span class="nav-unread"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a href="#" class="dropdown-item d-flex">
              <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
              <div>
                <strong>Mermelada "La Patriota"</strong> vence dentro de 2 dias.
                <div class="small text-muted">hace 10 minutos</div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url({{ asset('assets/dashboard/images/user.png') }})"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">{{ auth()->user()->name }}</span>
              <small class="text-muted d-block mt-1">Encargado</small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="{{ route('admin.users.edit', ['id' => auth()->user()->id]) }}">
              <i class="dropdown-icon fe fe-user"></i> Perfil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="dropdown-icon fe fe-log-out"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
