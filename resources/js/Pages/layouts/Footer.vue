<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" >Job Entry</a>, All Right Reserved.

                        Designed By <a class="border-bottom" href="https://essejacques.co">Esse Jacques</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <Link :href="route('home')">Home</Link>
                            <Link :href="route('jobs')" >Jobs</Link>
                            <Link :href="route('contact')" >Contact</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <Link href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></Link>

</template>

<style scoped>

</style>
