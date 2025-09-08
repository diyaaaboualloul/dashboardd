<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('/') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ url('/products') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Products
                </a>

                <div class="sb-sidenav-menu-heading">Authentication</div>

                @guest
                    <a class="nav-link" href="{{ route('login.form') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                        Login
                    </a>
                    <a class="nav-link" href="{{ route('register.form') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                        Register
                    </a>
                @endguest

                @auth
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        {{ auth()->user()->name }}
                    </a>
                    <form action="{{ route('logout') }}" method="GET" class="m-0">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-start w-100" style="color: inherit; text-decoration:none;">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </button>
                    </form>
                @endauth

                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            @auth
                <div class="small">Logged in as:</div>
                {{ auth()->user()->name }}
            @else
                <div class="small">You are not logged in</div>
            @endauth
        </div>
    </nav>
</div>
