<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <form action="{{route('search.user')}}" method="get">
                    <input name="search" class="form-control form-control-sidebar" type="search"
                           placeholder="Пошук по тел. або імені">
                </form>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-align-right"></i>
                        <p>
                            Категорії
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tags.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-align-right"></i>
                        <p>
                            Теги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Користувачі
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('parts.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Запчастини
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('brands.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Бренди та моделі
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Налаштування
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('settings.index')}}" class="nav-link">
                                <i class="far fa-calendar nav-icon"></i>
                                <p>Магазину</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('import.index')}}" class="nav-link">
                                <i class="far fa-calendar nav-icon"></i>
                                <p>Імпорт прайсів</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
