<script setup>
    defineProps({
        category: Object
        },
    );
    import { defineProps } from 'vue'
    import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <Link class="cat-item rounded p-4" :href="`categories/${category.slug}`">
            <i :class="`fa fa-3x ${category.icon} text-primary mb-4`"></i>
            <h6 class="mb-3">{{ category.name }}</h6>
            <p class="mb-0">{{ category.jobs.length}}</p>
        </Link>
    </div>
</template>

<style scoped>


</style>
