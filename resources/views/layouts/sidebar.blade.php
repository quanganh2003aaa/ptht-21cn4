<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Doanh thu</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('orders.index')}}">
          <i class="bi bi-grid"></i>
          <span>Đơn hàng</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Quản lí sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('products.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{route('products.create')}}">
              <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="{{route('products.index2')}}">
              <i class="bi bi-circle"></i><span>Sản phẩm hết hàng</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Quản lí nhà cung cấp</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('brands.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách nhà cung cấp</span>
            </a>
          </li>
          <li>
            <a href="{{route('brands.create')}}">
              <i class="bi bi-circle"></i><span>Thêm nhà cung cấp</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('get.register')}}">
          <i class="bi bi-grid"></i>
          <span>Đăng kí tài khoản</span>
        </a>
      </li>

    </ul>

  </aside>
