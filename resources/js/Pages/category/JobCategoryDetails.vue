<script setup>

import Breadcrumb from "../components/Breadcrumb.vue";
import JobCard from "../components/JobCard.vue";
import Pagination from "../components/Pagination.vue";
defineProps(
    {
        category: Object,
        jobs: Array
    }
);
</script>

<template>
    <!-- BreadCrumb Start -->
    <Breadcrumb :title="category.name" />
    <!-- BreadCrumb End -->
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing : {{category.name}}</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <JobCard v-for="job in jobs.data" :job="job" />
                    <div class=" d-inline-flex justify-content-center">
                        <pagination :links="jobs.links" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
</template>

<style scoped>

</style>
