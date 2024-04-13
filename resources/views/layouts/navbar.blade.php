{{--<!-- Spinner Start -->--}}
{{--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">--}}
{{--    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">--}}
{{--        <span class="sr-only">Loading...</span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Spinner End -->--}}


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home </a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ (request()->is('about')) ? 'active' : '' }}">About</a>
            <a href="{{ route('jobs') }}"
               class="nav-item  nav-link {{ (request()->is('jobs*')) ? 'active' : '' }}">Jobs</a>
            <a href="{{ route('job-categories') }}"
               class="nav-item  nav-link {{ (request()->is('job-categories')) ? 'active' : '' }}">Job Category</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link" {{ (request()->is('contact')) ? 'active' : '' }}>Contact</a>
            @guest
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="ms-1 d-none d-lg-inline-block">Register</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('register') }}" class="dropdown-item">Applicant</a>
                        <a href="{{ route('enterprise') }}" class="dropdown-item">Enterprise</a>
                    </div>
                </div>

            @else
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="ms-1 d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
                    </div>
                </div>
            @endguest
        </div>
        <a href="/post-job" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
