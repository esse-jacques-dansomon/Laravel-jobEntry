<template>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" :src="`assets/img/carousel-1.jpg`" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                     style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You
                                    Deserved</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    Search and apply for the latest jobs in the best companies in the world. Find the
                                    best
                                </p>
                                <Link :href="route('jobs')"
                                      class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" :src="'assets/img/carousel-2.jpg'" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                     style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">
                                    Find The Best Startup Job That Fit You
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor
                                    at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                    elitr.
                                </p>
                                <Link :href="route('jobs')"
                                      class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A job
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Search Start -->
    <SearchJobsForm :categories="categories"/>
    <!-- Search End -->


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                <category-card
                    v-for="category in categories"
                    :category="category"
                    :key="category.id"
                />

            </div>
        </div>
    </div>
    <!-- Category End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" :src="'assets/img/about-1.jpg'">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" :src="'assets/img/about-2.jpg'" style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" :src="'assets/img/about-3.jpg'" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" :src="'assets/img/about-4.jpg'">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat
                        amet</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">

                    <li class="nav-item" v-for="(typeJob, index) in typesJobs">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3"
                           :class="{ 'active': index === 0 }" data-bs-toggle="pill" :href="`#tab-${ typeJob.id }`">
                            <h6 class="mt-n1 mb-0">{{ typeJob.name }}</h6>
                        </a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div v-for="(typeJob, index) in typesJobs" :key="typeJob.id" :id="`tab-${typeJob.id}`"
                         class="tab-pane fade show p-0" :class="{ 'active': index === 0 }">
                        <job-card v-for="job in typeJob['jobs'].data" :key="job.id" :job="job"/>
                        <Link class="btn btn-primary py-3 px-5" :href="route('jobs')">Browse More Jobs</Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="text-center mb-5">Our Clients Say!!!</h1>
            <div class="owl-carousel testimonial-carousel">
                <TestMonialCard v-for="testimonial in testimonies" :key="testimonial.id" :testimonial="testimonial"/>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
</template>

<script setup>
import CategoryCard from "../components/CategoryCard.vue";
import JobCard from "../components/JobCard.vue";
import TestMonialCard from "../components/TestMonialCard.vue";
import {Link,} from '@inertiajs/vue3'
import SearchJobsForm from "../components/SearchJobsForm.vue";

defineProps({
    categories: Array,
    testimonies: Array,
    typesJobs: Array
});
</script>
