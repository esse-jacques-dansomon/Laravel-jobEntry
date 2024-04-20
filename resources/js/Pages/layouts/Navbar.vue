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
                <template v-if="!$page.props.user">
                    <a href="/login" class="nav-item nav-link">Login</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="ms-1 d-none d-lg-inline-block">Register</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/register" class="dropdown-item">Applicant</a>
                            <a href="/enterprise" class="dropdown-item">Enterprise</a>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="ms-1 d-none d-lg-inline-block">{{ $page.props.user.name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/dashboard" class="dropdown-item">Dashboard</a>
                            <a href="/logout" class="dropdown-item" @click.prevent="logout">Logout</a>
                        </div>
                    </div>
                </template>
            </div>
            <a href="/post-job" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
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
