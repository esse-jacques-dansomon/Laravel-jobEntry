{{--<!-- Spinner Start -->--}}
{{--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">--}}
{{--    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">--}}
{{--        <span class="sr-only">Loading...</span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Spinner End -->--}}


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobEntry</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home </a>
            <a href="/about" class="nav-item nav-link {{ (request()->is('about')) ? 'active' : '' }}">About</a>
            <a href="/jobs" class="nav-item  nav-link {{ (request()->is('jobs')) ? 'active' : '' }}">Jobs</a>
            <a href="/job-categories" class="nav-item  nav-link {{ (request()->is('job-categories')) ? 'active' : '' }}">Job Category</a>
            <a href="/testimonial" class="nav-item  nav-link {{ (request()->is('testimonial')) ? 'active' : '' }}">Testimonial</a>
            <a href="/contact" class="nav-item nav-link" {{ (request()->is('contact')) ? 'active' : '' }}>Contact</a>
        </div>
        <a href="/post-job" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
