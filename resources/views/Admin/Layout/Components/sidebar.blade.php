<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{route("admin.dashboard")}}">
          <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
        </a>    
        <a class="sidebar-brand brand-logo-mini" href="{{route("admin.dashboard")}}">
          <img src="{{asset('admin/assets/images/logo-mini.png')}}" alt="logo" />
        </a>  
      </div>
      <ul class="nav">
      <li class="nav-item menu-items">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
          <span class="menu-icon">
            <i class="mdi mdi-monitor-dashboard"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">
        <span class="nav-link">Produtos</span>   
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link">
          <span class="menu-icon">
            <i class="mdi mdi-newspaper-plus"></i>
          </span>
          <span class="menu-title">Marcas</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-newspaper-plus"></i>
          </span>
          <span class="menu-title">Categorias</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('admin.product.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-cart-plus"></i>
          </span>
          <span class="menu-title">Produtos</span>
        </a>
      </li>

      <li class="nav-item nav-category">
        <span class="nav-link">Movimentações</span>   
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-alpha-o-box-outline"></i>
          </span>
          <span class="menu-title">Origem</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-alpha-d-box-outline"></i>
          </span>
          <span class="menu-title">Destino</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-alpha-c-box-outline"></i>
          </span>
          <span class="menu-title">Cat. Movimentação</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-alpha-t-box-outline"></i>
          </span>
          <span class="menu-title">Tipo Movimentação</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-alpha-m-box-outline"></i>
          </span>
          <span class="menu-title">Movimentações</span>
        </a>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Sistema</span>   
      </li>
      
      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple-plus"></i>
          </span>
          <span class="menu-title">Usuários</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-bug"></i>
          </span>
          <span class="menu-title">Logs</span>
        </a>
      </li>
    </ul>
</nav>