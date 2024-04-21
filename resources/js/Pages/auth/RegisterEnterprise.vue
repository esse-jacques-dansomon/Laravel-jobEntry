<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    name: '',
    email: '',
    description: '',
    logo: '',
    website: '',
    password: '',
    password_confirmation: ''
});


const onFileChange = (event) => {
    form.logo = event.target.files[0];
};

const submitForm = () => {
    form.post('/enterprise', {
        onSuccess: () => {
            // Handle successful submission
        },
        onError: (errors) => {
            // Handle errors
            errors.general = errors.message;
        }
    });
};
</script>

<template>
    <div class="justify-content-center">
        <div class="">
            <div class="card">
                <Breadcrumb title="Register as Enterprise"/>
                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="form.name" required>
                                <div v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</div>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email" required>
                                <div v-if="form.errors.email" class="text-danger">{{ form.errors.email }}</div>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" v-model="form.description"></textarea>
                                <div v-if="form.errors.description" class="text-danger">{{ form.errors.description }}</div>
                            </div>
                        </div>

                        <!-- Logo Field -->
                        <div class="row mb-3">
                            <label for="logo" class="col-md-4 col-form-label text-md-end">Logo</label>
                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" @change="onFileChange">
                                <div v-if="form.errors.logo" class="text-danger">{{ form.errors.logo }}</div>
                            </div>
                        </div>

                        <!-- Website Field -->
                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" v-model="form.website" required>
                                <div v-if="form.errors.website" class="text-danger">{{ form.errors.website }}</div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="form.password" required>
                                <div v-if="form.errors.password" class="text-danger">{{ form.errors.password }}</div>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" required>
                                <div v-if="form.errors.password_confirmation" class="text-danger">{{ form.errors.password_confirmation }}</div>
                            </div>
                        </div>

                        <!-- General Errors -->
                        <div v-if="form.errors.general" class="text-danger">{{ form.errors.general }}</div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">Register Enterprise</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>

</style>
