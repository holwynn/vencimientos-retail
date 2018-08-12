<div class="header navbar">
  <div class="header-container">
    <ul class="nav-left">
      <li>
        <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
          <i class="ti-menu"></i>
        </a>
      </li>
      <li class="search-box">
        <a class="search-toggle no-pdd-right" href="javascript:void(0);">
          <i class="search-icon ti-search pdd-right-10"></i>
          <i class="search-icon-close ti-close pdd-right-10"></i>
        </a>
      </li>
      <li class="search-input">
        <input class="form-control" type="text" placeholder="Search...">
      </li>
    </ul>
    <ul class="nav-right">
      <li class="notifications dropdown">
        <span class="counter bgc-red">1</span>
        <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
          <i class="ti-bell"></i>
        </a>

        <ul class="dropdown-menu">
          <li class="pX-20 pY-15 bdB">
            <i class="ti-bell pR-10"></i>
            <span class="fsz-sm fw-600 c-grey-900">Notificaciones</span>
          </li>
          <li>
            <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
              <li>
                <a href="" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                  <div class="peer mR-15">
                    <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
                  </div>
                  <div class="peer peer-greed">
                    <span>
                      <span class="fw-500">Mermelada "La Patriota" x130gr</span>
                      <span class="c-grey-600">vence el <span class="text-dark">3 de enero</span>
                      </span>
                    </span>
                    <p class="m-0">
                      <small class="fsz-xs">10 mins ago</small>
                    </p>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="pX-20 pY-15 ta-c bdT">
            <span>
              <a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a>
            </span>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
          <div class="peer mR-10">
            <img class="w-2r bdrs-50p" src="{{ asset('assets/admin/static/images/user.png') }}" alt="">
          </div>
          <div class="peer">
            <span class="fsz-sm c-grey-900">{{ auth()->user()->name }}</span>
          </div>
        </a>
        <ul class="dropdown-menu fsz-sm">
          <li>
            <a href="{{ route('admin.users.edit', ['id' => auth()->user()->id]) }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-user mR-10"></i>
              <span>Mi perfil</span>
            </a>
          </li>
          <li role="separator" class="divider"></li>
          <li>
            <a href="{{ route('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="ti-power-off mR-10"></i>
              <span>Salir</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
