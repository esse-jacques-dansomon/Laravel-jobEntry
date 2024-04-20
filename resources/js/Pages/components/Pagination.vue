<template>
    <div class="pagination">
        <Link :class="`a ${l.active ? 'active' : '' }`" :key="i" :href="l.url" v-for="(l, i) in links" v-html="l.label"> </Link>
    </div>
</template>
<style scoped>

.pagination {
    display: inline-block;
    width: 100%;
}

.pagination .a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination .a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination .a:hover:not(.active) {background-color: #ddd;}

</style>

<script setup>
import { defineProps } from 'vue'
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    links: Object
})

</script>

