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
                                <input id="name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" v-model="form.name" required autocomplete="name" autofocus>
                                <span class="invalid-feedback" role="alert" v-if="errors.name">
                                <strong>{{ errors.name[0] }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" :class="{ 'is-invalid': errors.email }" v-model="form.email" required autocomplete="email">
                                <span class="invalid-feedback" role="alert" v-if="errors.email">
                                <strong>{{ errors.email[0] }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="portfolio" class="col-md-4 col-form-label text-md-end">Portfolio</label>
                            <div class="col-md-6">
                                <input id="portfolio" type="text" class="form-control" :class="{ 'is-invalid': errors.portfolio }" v-model="form.portfolio" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.portfolio">
                                <strong>{{ errors.portfolio[0] }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="coverLetter" class="col-md-4 col-form-label text-md-end">Cover Letter</label>
                            <div class="col-md-6">
                                <textarea id="coverLetter" class="form-control" :class="{ 'is-invalid': errors.coverLetter }" v-model="form.coverLetter" required></textarea>
                                <span class="invalid-feedback" role="alert" v-if="errors.coverLetter">
                                <strong>{{ errors.coverLetter[0] }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cv" class="col-md-4 col-form-label text-md-end">CV</label>
                            <div class="col-md-6">
                                <input id="cv" type="file" class="form-control" :class="{ 'is-invalid': errors.cv }" @change="handleFileUpload($event, 'cv')" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.cv">
                                <strong>{{ errors.cv[0] }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">Photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" :class="{ 'is-invalid': errors.photo }" @change="handleFileUpload($event, 'photo')" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.photo">
                                <strong>{{ errors.photo[0] }}</strong>
                            </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" :class="{ 'is-invalid': errors.password }" v-model="form.password" required autocomplete="new-password">
                                <span class="invalid-feedback" role="alert" v-if="errors.password">
                                <strong>{{ errors.password[0] }}</strong>
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

<script>
import Breadcrumb from "../components/Breadcrumb.vue";

export default {
    components: {Breadcrumb},
    data() {
        return {
            form: {
                name: '',
                email: '',
                portfolio: '',
                coverLetter: '',
                cv: null,
                photo: null,
                password: '',
                password_confirmation: ''
            },
            errors: {}
        };
    },
    methods: {
        handleFileUpload(event, fieldName) {
            this.form[fieldName] = event.target.files[0];
        },
        submitForm() {
            let formData = new FormData();
            Object.keys(this.form).forEach(key => {
                formData.append(key, this.form[key]);
            });

            axios.post('/register', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    // Handle successful submission
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        }
    }
}
</script>


<style scoped>

</style>
