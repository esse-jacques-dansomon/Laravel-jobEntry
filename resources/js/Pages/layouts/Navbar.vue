<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <Link :href="route('home')" class="nav-item nav-link" :class="{ active: route().current('home') }">Home</Link>
                <Link :href="route('about')" class="nav-item nav-link" :class="{ active: route().current('about') }">About</Link>
                <Link :href="route('jobs')" class="nav-item nav-link" :class="{ active: route().current('jobs') }">Jobs</Link>
                <Link :href="route('categories')" class="nav-item nav-link" :class="{ active: route().current('categories') }">Job Category</Link>
                <Link :href="route('contact')" class="nav-item nav-link" :class="{ active: route().current('contact') }">Contact</Link>
                <template v-if="!$page.props.auth.user">
                    <Link :href="route('login')" class="nav-item nav-link">Login</Link>
                    <div class="nav-item dropdown">
                        <Link class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="ms-1 d-none d-lg-inline-block">Register</span>
                        </Link>
                        <div class="dropdown-menu dropdown-menu-end">
                            <Link :href=" route('register')" class="dropdown-item">Applicant</Link>
                            <Link :href="route('enterprise')" class="dropdown-item">Enterprise</Link>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="nav-item dropdown">
                        <Link class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="ms-1 d-none d-lg-inline-block">{{ $page.props.auth.user.name }}</span>
                        </Link>
                        <div class="dropdown-menu dropdown-menu-end">
                            <Link :href="route('dashboard')" class="dropdown-item">Dashboard</Link>
                            <Link :href="route('logout')" class="dropdown-item" @click.prevent="logout">Logout</Link>
                        </div>
                    </div>
                </template>
            </div>
            <Link :href="route('post-job')" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></Link>
        </div>
    </nav>
</template>

<script>

export default {
    methods: {
        logout() {
            this.$inertia.post('/logout');
        }
    }
}
</script>


<style scoped>

</style>
