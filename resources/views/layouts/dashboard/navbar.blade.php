<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset(auth()->user()->image_path) }}" class="elevation-2 img-circle"
                     alt="User Image" width="30px;" height="30px;">
                <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('profile')}}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset(auth()->user()->image_path) }}" class="img-size-50 mr-3 img-circle"
                             alt="User Image">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ auth()->user()->name }}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                @if(auth()->user()->hasPermission('read_profile'))
                    <a href="{{route('profile')}}" class="dropdown-item dropdown-footer text-center">Profile</a>
                    <div class=" dropdown-divider"></div>
                @endif


                <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer text-center" id="nav-logout"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>

            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
