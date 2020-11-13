<aside class="main-sidebar sidebar-dark-primary  elevation-4">

    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-image img-circle elevation-3 mt-1 mr-3">
       <img src="{{asset('/uploads/Blue_Deve-01.png')}}" alt="" height="35px">
        </span>
        <span class="brand-text font-weight-bold">Blue-Commerce</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->image_path}}" class="img-circle elevation-2" alt="admin avatar">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!---    read_users   --->
                @if (auth()->user()->hasPermission('read_users'))

                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users-cog mr-2" aria-hidden="true"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link">
                                    <i class="fa fa-list-ol nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon mr-2"></i>
                                    <p>Add New User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            <!---    read_destinations   --->
                @if (auth()->user()->hasPermission('read_categories'))
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-location-arrow"></i>
                            <p>
                                Categories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link">
                                    <i class="fa fa-list-ol nav-icon"></i>
                                    <p>All Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add New Categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            <!---    read_categories   --->
                <!---    read_destinations   --->
                @if (auth()->user()->hasPermission('read_brands'))
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-location-arrow"></i>
                            <p>
                                Brands
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('brands.index')}}" class="nav-link">
                                    <i class="fa fa-list-ol nav-icon"></i>
                                    <p>All Brands</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('brands.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add New Brands</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            <!---    read_categories   --->
                <!---    read_destinations   --->
                @if (auth()->user()->hasPermission('read_products'))
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-location-arrow"></i>
                            <p>
                                Products
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="fa fa-list-ol nav-icon"></i>
                                    <p>All Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add New Products</p>
                                </a>
                            </li>
                        </ul>
                    </li>
            @endif
            <!---    read_categories   --->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
