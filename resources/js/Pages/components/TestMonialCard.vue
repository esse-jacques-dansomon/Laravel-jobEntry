<script setup>
defineProps({
    testimonial: Object
    },

);
import { defineProps } from 'vue'
</script>

<template>
    <div class="testimonial-item bg-light rounded p-4">
        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
        <p>{{testimonial.content}}</p>
        <div class="d-flex align-items-center">
            <i v-if="testimonial.user.role === 'applicant'" class="fa fa-user fa-2x text-primary"></i>
            <i v-else-if="testimonial.user.role === 'enterprise'" class="fa fa-building fa-2x text-primary"></i>
            <div class="ps-3">
                <h5 class="mb-1">{{testimonial.user.name}}</h5>
                <small>{{ testimonial.user.name}}</small>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
