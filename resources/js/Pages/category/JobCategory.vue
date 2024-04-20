<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import CategoryCard from "../components/CategoryCard.vue";
defineProps({
    categories: Array
})
</script>

<template>
    <!-- BreadCrumb Start -->
    <Breadcrumb title="Category" />
    <!-- BreadCrumb End -->


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                <Category-card v-for="category in categories" :category="category" />
            </div>
        </div>
    </div>
    <!-- Category End -->
</template>

<style scoped>
</style>
