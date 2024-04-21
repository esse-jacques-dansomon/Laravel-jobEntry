<script setup>
defineProps({
    categories: Array
})
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    keyword: '',
    category: '',
    type: ''
});

const onSubmit = () => {
    form.post('/jobs');
}
</script>

<template>
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form @submit.prevent="onSubmit" class="row g-2">
                <div class="col-md-10">
                    <div  class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0" placeholder="Keyword" v-model="form.keyword" />
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" v-model="form.category">
                                <option selected>Category</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" v-model="form.type">
                                <option selected >Type</option>
                                <option value="internship">internship</option>
                                <option value="full-time">Full time</option>
                                <option value="part-time">Part time</option>
                                <option value="freelance">freelance</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100" >Search</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
