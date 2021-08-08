<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
      <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
        <a class="navbar-brand w-100 mr-0" href="{{ route('home') }}" style="line-height: 25px;">
          <div class="d-table m-auto">
            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('shards/images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
            <span class="d-none d-md-inline ml-1">Shards Dashboard</span>
          </div>
        </a>
        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
          <i class="material-icons">&#xE5C4;</i>
        </a>
      </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
      <div class="input-group input-group-seamless ml-3">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-search"></i>
          </div>
        </div>
        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
    </form>
    <div class="nav-wrapper">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('dashboard*') ? 'active' : '' }} " href="{{ route('dashboard') }}">
            <i class="material-icons">edit</i>
            <span>Dashboard</span>
          </a>
        </li>

        @can('view categories')
          <li class="nav-item">
            <a class="nav-link  {{ Route::currentRouteNamed('categories*') ? 'active' : '' }} "  href="{{ route('categories') }}">
              <i class="material-icons">vertical_split</i>
              <span>Danh mục sản phẩm</span>
            </a>
          </li>
        @endcan

        @can('view product')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('products*') ? 'active' : '' }}"  href="{{ route('products') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Sản phẩm</span>
          </a>
        </li>
        @endcan

        @can('view user')
        <li class="nav-item">
          <a class="nav-link  {{ Route::currentRouteNamed('users*') ? 'active' : '' }}"  href="{{ route('users') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Quản trị viên</span>
          </a>
        </li>
        @endcan
        
        @can('view slider')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('slider*') ? 'active' : '' }} "  href="{{ route('slider') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Slide show</span>
          </a>
        </li>
        @endcan

        @can('view settings')
          <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('setting*') ? 'active' : '' }}"    href="{{ route('setting') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Settings</span>
          </a>
        </li>
        @endcan

        @can('view order')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('orders*') ? 'active' : '' }} "  href="{{ route('orders') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Đơn hàng</span>
          </a>
        </li>
        @endcan

        @can('view post')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('posts*') ? 'active' : '' }} "  href="{{ route('posts') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Bài viết</span>
          </a>
        </li>
        @endcan

        @can('view customer')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('customers*') ? 'active' : '' }} "  href="{{ route('customers') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Khách hàng</span>
          </a>
        </li>
        @endcan

        @can('view permissions')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('permission*') ? 'active' : '' }} "  href="{{ route('permission') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Permission</span>
          </a>
        </li>
        @endcan

        @can('view role')
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('role*') ? 'active' : '' }} "  href="{{ route('role') }}">
            <i class="fab fa-product-hunt"></i>
            <span>Role</span>
          </a>
        </li>
        @endcan

        
 
      </ul>
    </div>
  </aside>