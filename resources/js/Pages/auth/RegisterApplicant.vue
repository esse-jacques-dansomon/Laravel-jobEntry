<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const form  = useForm({
    name: '',
    email: '',
    portfolio: '',
    coverLetter: '',
    cv: '',
    photo: '',
    password: '',
    password_confirmation: ''
});


// Method to handle file uploads
const handleFileUpload = (event, fieldName) => {
    const file = event.target.files[0];
    if (file) {
        form[fieldName] = file;
    }
};

// Method to submit the form
const submitForm = () => {
    form.post('/register', {
        onSuccess: () => {
            // Handle successful submission
        },
        onError: (errors) => {
            // Handle errors
        }
    });
};
</script>

<template>
    <div class="justify-content-center">
        <div class="">
            <div class="card">
                <Breadcrumb title="Register as Job Seeker"/>

                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.name }" v-model="form.name" required autocomplete="name" autofocus>
                                <span class="invalid-feedback" role="alert" v-if="form.errors.name">
                                <strong>{{ form.errors.name }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" :class="{ 'is-invalid': form.errors.email }" v-model="form.email" required autocomplete="email">
                                <span class="invalid-feedback" role="alert" v-if="form.errors.email">
                                <strong>{{ form.errors.email }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="portfolio" class="col-md-4 col-form-label text-md-end">Portfolio</label>
                            <div class="col-md-6">
                                <input id="portfolio" type="text" class="form-control" :class="{ 'is-invalid': form.errors.portfolio }" v-model="form.portfolio" required>
                                <span class="invalid-feedback" role="alert" v-if="form.errors.portfolio">
                                <strong>{{ form.errors.portfolio }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="coverLetter" class="col-md-4 col-form-label text-md-end">Cover Letter</label>
                            <div class="col-md-6">
                                <textarea id="coverLetter" class="form-control" :class="{ 'is-invalid': form.errors.coverLetter }" v-model="form.coverLetter" required></textarea>
                                <span class="invalid-feedback" role="alert" v-if="form.errors.coverLetter">
                                <strong>{{ form.errors.coverLetter }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cv" class="col-md-4 col-form-label text-md-end">CV</label>
                            <div class="col-md-6">
                                <input id="cv" type="file" class="form-control" :class="{ 'is-invalid': form.errors.cv }" @change="handleFileUpload($event, 'cv')"  required>
                                <span class="invalid-feedback" role="alert" v-if="form.errors.cv">
                                <strong>{{ form.errors.cv }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">Photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" :class="{ 'is-invalid': form.errors.photo }" @change="handleFileUpload($event, 'photo')" required>
                                <span class="invalid-feedback" role="alert" v-if="form.errors.photo">
                                <strong>{{ form.errors.photo }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" :class="{ 'is-invalid': form.errors.password }" v-model="form.password" required autocomplete="new-password">
                                <span class="invalid-feedback" role="alert" v-if="form.errors.password">
                                <strong>{{ form.errors.password }}</strong>

                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="form.password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>
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
