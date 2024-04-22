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
        <link
            href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
            rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <body>

    <div class="container-xxl bg-white p-0">

        <Navbar/>
        <div   v-if="messages.length > 0" class="flash-message-container">
            <flash-message
                v-if="messages.length > 0"
                v-for="(message, index) in messages"
                :key="index"
                :message="message.message"
                :type="message.type"
            />
        </div>
        <slot></slot>
        <Footer/>
    </div>

    </body>
    </html>

</template>

<script setup>
import  {Link, usePage} from '@inertiajs/vue3';
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";
import {ref, watch} from "vue";
const page = usePage();
const messages = ref([]);

watch(() => usePage().props.flash, (next) => {
    if (!next || !next.message ) return;
    messages.value.push(next);
    setTimeout(() => {
        messages.value.shift();
    }, 7000);
});

</script>

<style>
/* Add your global styles here */
.flash-message-container {
    position: fixed;
    top: 1rem;
    right: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    z-index: 9999;
}

</style>


