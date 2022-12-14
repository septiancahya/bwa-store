<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="{{ url('/images/admin.png') }}" alt="" class="my-4" style="max-width: 100px"/>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}">Dashboard</a>
                    <a
                    href="{{ route('product.index') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }} "
                    >Products</a
                    >
                    <a
                    href="{{ route('product-gallery.index') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }} "
                    >Product Galleries</a
                    >
                    <a
                    href="{{ route('category.index') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }} "
                    >Categories</a
                    >
                    <a
                    href="#"
                    class="list-group-item list-group-item-action"
                    >Transaction</a
                    >
                    <a
                    href="{{ route('user.index') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }} "
                    >Users</a
                    >
                    <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action"
                    >Sign Out</a
                    >
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
            </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down" >
                <div class="container-fluid">
                <button
                    class="btn btn-secondary d-md-none mr-auto mr-2"
                    id="menu-toggle"
                >
                    &laquo; Menu
                </button>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a
                        href="#"
                        class="nav-link"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        >
                        <img
                            src="/images/user_pc.png"
                            alt=""
                            class="rounded-circle mr-2 profile-picture"
                        />
                        Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                        </div>
                        </li>
                    
                        </ul>
                        <ul class="navbar-nav d-block d-lg-none">
                            <li class="nav-item">
                                <a href="{{ route('admin-dashboard') }}" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Section Content -->
            @yield('content')
        </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>

</html>