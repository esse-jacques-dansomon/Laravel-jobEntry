
<template>
    <html lang="">
    <head>
        <meta charset="utf-8">
        <title>JobEntry</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="../../img/favicon.ico" rel="icon">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
              rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <body>
    <div class="container-xxl bg-white p-0">
        <Navbar/>
            <slot></slot>
        <Footer/>
    </div>

    </body>
    </html>

</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
import {computed} from "vue";
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";
const page = usePage();
// let message = computed(() => page.props.flash.success);
// setTimeout(() => {
//     if (message.value) {
//         page.props.flash.success= null;
//         message = null;
//         console.log(message);
//     }
// }, 1000);
</script>

<style>
/* Add your global styles here */


</style>


