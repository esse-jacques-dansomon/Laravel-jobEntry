<script setup>

import Breadcrumb from "../components/Breadcrumb.vue";
import JobCard from "../components/JobCard.vue";
import Pagination from "../components/Pagination.vue";
import SearchJobsForm from "../components/SearchJobsForm.vue";
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
    <SearchJobsForm :categories="categories" />
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
