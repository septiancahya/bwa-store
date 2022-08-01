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
                    <img src="/images/dashboard-logo.svg" alt="" class="my-4" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}">Dashboard</a>
                    <a
                    href="{{ route('dashboard-product') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard/product*')) ? 'active' : '' }}"
                    >My Products</a
                    >
                    <a
                    href="{{ route('dashboard-transaction') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard/transaction*')) ? 'active' : '' }}"
                    >Transactions</a
                    >
                    <a
                    href="{{ route('dashboard-store-setting') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard/store-setting*')) ? 'active' : '' }}"
                    >Store Settings</a
                    >
                    <a
                    href="{{ route('dashboard-account-setting') }}"
                    class="list-group-item list-group-item-action {{ (request()->is('dashboard/account-setting*')) ? 'active' : '' }}"
                    >My Account</a
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
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a
                        >
                        <a href="{{ route('dashboard-account-setting') }}" class="dropdown-item"
                            >Setting</a
                        >
                        <div class="dropdown-divider"></div>
                        <a hhref="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                        </div>
                        </li>
                        <li class="navbar-item">
                            <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                 @php
                                $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0)
                                    <img src="/images/icon-cart.svg" alt="" />
                                    <div class="card-badge">{{ $carts }}</div>
                                @else
                                    <img src="/images/icon-cart-empty.svg" alt="" />
                                @endif
                            </a>
                        </li>
                        </ul>
                        <ul class="navbar-nav d-block d-lg-none">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item d-inline-block">
                                <a href="{{ route('cart') }}" class="nav-link">Cart</a>
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