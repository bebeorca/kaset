<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/orderan') ? 'active' : '' }}" href="/dashboard/orderan">
            <span data-feather="shopping-cart"></span>
            Orderan Masuk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/orderan-selesai') ? 'active' : '' }}" href="/dashboard/orderan-selesai">
            <span data-feather="check"></span>
            Orderan Selesai
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/menus*') ? 'active' : '' }}" href="/dashboard/menus">
              <span data-feather="clipboard"></span>
              Menu
            </a>
        </li>
      </ul>
    </div>
  </nav>