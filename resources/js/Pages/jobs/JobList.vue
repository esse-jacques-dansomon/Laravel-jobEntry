<script setup>

import Breadcrumb from "../components/Breadcrumb.vue";
import JobCard from "../components/JobCard.vue";
import Pagination from "../components/Pagination.vue";
defineProps(
    {
        typesJobs: Array,
        categories: Array,
        jobs: Array
    }
);

</script>

<template>
    <!-- BreadCrumb Start -->
    <Breadcrumb title="Jobs" />
    <!-- BreadCrumb End -->

    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0" placeholder="Keyword"/>
                        </div>
                        <div class="col-md-4">

                            <select class="form-select border-0">
                                <option selected>Category</option>
                                <option v-for="category in categories" value="{{category.id}}">{{ category.name }}
                                </option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Type</option>
                                <option value="0">Full Time </option>
                                <option value="1">Internship </option>
                                <option value="2">Part Time</option>
                                <option value="3">Freelance</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <job-card v-for="job in jobs.data" :key="job.id" :job="job"/>
            </div>
            <div class=" d-inline-flex justify-content-center">
                <pagination :links="jobs.links" />
            </div>
        </div>


    </div>
    <!-- Jobs End -->
</template>

<style scoped>

</style>
